<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderService $orderService) {}

    public function store(Request $request)
    {
        $request->validate([
            'voucher_code' => 'nullable|string|exists:vouchers,code',
        ]);

        $order = $this->orderService->checkout(
            $request->user()->customer,
            $request->voucher_code
        );

        return response()->json($order->load('orderItems.product'), 201);
    }

    public function index(Request $request)
    {
        $orders = $request->user()->customer->orders()->with('orderItems.product')->latest()->get();

        return response()->json($orders);
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);

        return response()->json($order->load('orderItems.product', 'payment', 'delivery'));
    }

    public function adminIndex()
    {
        return response()->json(
            Order::with('orderItems.product', 'customer.user')->latest()->get()
        );
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,completed,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return response()->json($order);
    }
}