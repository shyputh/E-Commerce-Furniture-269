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
        $cartItems = $customer->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            throw ValidationException::withMessages([
                'cart' => ['Keranjang kamu masih kosong.'],
            ]);
        }

        foreach ($cartItems as $item) {
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

        return DB::transaction(function () use ($customer, $cartItems, $voucher) {
            $subtotal = $cartItems->sum(fn ($item) => $item->qty * $item->product->price);
            $total = max($subtotal - ($voucher->discount_value ?? 0), 0);

            $order = Order::create([
                'customer_id' => $customer->id,
                'voucher_id' => $voucher?->id,
                'status' => 'pending',
                'total' => $total,
            ]);

            foreach ($cartItems as $item) {
                $order->orderItems()->create([
                    'product_id' => $item->product_id,
                    'qty' => $item->qty,
                    'price_snapshot' => $item->product->price,
                ]);

                $item->product->decrement('stock', $item->qty);
            }

            $customer->cartItems()->delete();

            return $order;
        });
    }
}