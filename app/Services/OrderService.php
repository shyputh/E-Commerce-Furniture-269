<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderService
{
    public function checkout(Customer $customer, ?string $voucherCode = null): Order
    {
        $cartItem = $customer->cartItem()->with('product')->get();

        if ($cartItem->isEmpty()) {
            throw ValidationException::withMessages([
                'cart' => ['Keranjang kamu masih kosong.'],
            ]);
        }

        foreach ($cartItem as $item) {
            if ($item->qty > $item->product->stock) {
                throw ValidationException::withMessages([
                    'stock' => ["Stok {$item->product->name} tidak cukup. Sisa: {$item->product->stock}."],
                ]);
            }
        }

        $voucher = null;
        if ($voucherCode) {
            $voucher = Voucher::where('code', $voucherCode)->first();

            if (! $voucher) {
                throw ValidationException::withMessages([
                    'voucher' => ['Kode voucher tidak ditemukan.'],
                ]);
            }
        }

        return DB::transaction(function () use ($customer, $cartItem, $voucher) {
            $subtotal = $cartItem->sum(fn ($item) => $item->qty * $item->product->price);
            $total = max($subtotal - ($voucher->discount_value ?? 0), 0);

            $order = Order::create([
                'customer_id' => $customer->id,
                'voucher_id' => $voucher?->id,
                'status' => 'pending',
                'total' => $total,
            ]);

            foreach ($cartItem as $item) {
                $order->orderItems()->create([
                    'product_id' => $item->product_id,
                    'qty' => $item->qty,
                    'price_snapshot' => $item->product->price,
                ]);

                $item->product->decrement('stock', $item->qty);
            }

            $customer->cartItem()->delete();

            return $order;
        });
    }
}