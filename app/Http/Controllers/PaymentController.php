<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $this->authorize('view', $order);

        $request->validate([
            'method' => 'required|string|in:transfer_bank,cod',
        ]);

        if ($order->payment) {
            return response()->json(['message' => 'Order ini sudah punya pembayaran.'], 422);
        }

        $payment = $order->payment()->create([
            'method' => $request->method,
            'status' => 'pending',
        ]);

        return response()->json($payment, 201);
    }

    public function updateStatus(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,failed',
        ]);

        $payment->update(['status' => $request->status]);

        if ($request->status === 'paid') {
            $payment->order->update(['status' => 'paid']);
        }

        return response()->json($payment);
    }
}