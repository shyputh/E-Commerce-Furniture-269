<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;

class CartItemController extends Controller
{
   public function index(Request $request)
    {
        $customer = $request->user()->customer;

        if (! $customer) {
            return response()->json(['message' => 'Profil customer tidak ditemukan.'], 404);
        }

        return response()->json($customer->cartItem()->with('product')->get());
    }

    public function store(StoreCartItemRequest $request)
    {
        $customer = $request->user()->customer;

        $cartItem = CartItem::firstOrNew(
            ['customer_id' => $customer->id, 'product_id' => $request->product_id],
            ['qty' => 0]
        );

        $cartItem->qty += $request->qty;
        $cartItem->save();

        return response()->json($cartItem, 201);
    }

    public function update(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        $this->authorize('update', $cartItem);

        $cartItem->update($request->validated());
        return response()->json($cartItem);
    }

    public function destroy(CartItem $cartItem)
    {
        $this->authorize('delete', $cartItem);

        $cartItem->delete();
        return response()->json(null, 204);
    }
}