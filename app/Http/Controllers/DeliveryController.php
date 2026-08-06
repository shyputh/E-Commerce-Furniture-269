<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'courier' => 'required|string',
        ]);

        $delivery = $order->delivery()->create([
            'courier' => $request->courier,
            'status' => 'preparing',
        ]);

        return response()->json($delivery, 201);
    }

    // public function update(Request $request, Delivery $delivery)
    // {
    //     $request->validate([
    //         // 'tracking_no' => 'sometimes|required|string',
    //         'status' => 'sometimes|required|in:preparing,shipped,delivered',
    //     ]);

    //     $delivery->update($request->validated());

    //     if (in_array($request->status, ['shipped', 'delivered'])) {
    //         $delivery->order->update([
    //             'status' => $request->status === 'delivered' ? 'completed' : 'shipped',
    //         ]);
    //     }

    //     return response()->json($delivery);
    // }

    public function update(Request $request, Delivery $delivery)
    {
        $validatedData = $request->validate([
            'courier' => 'sometimes|required|string',
            'status' => 'sometimes|required|in:preparing,shipped,delivered',
        ]);

        $delivery->update($validatedData);

        if (in_array($request->status, ['shipped', 'delivered'])) {
            $delivery->order->update([
                'status' => $request->status === 'delivered' ? 'completed' : 'shipped',
            ]);
        }

        return response()->json($delivery);
    }
}