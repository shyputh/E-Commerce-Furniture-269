<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        return response()->json(Voucher::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:vouchers,code',
            'discount_value' => 'required|integer|min:0',
        ]);

        $voucher = Voucher::create($request->only('code', 'discount_value'));
        return response()->json($voucher, 201);
    }

    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'code' => 'sometimes|required|string|unique:vouchers,code,' . $voucher->id,
            'discount_value' => 'sometimes|required|integer|min:0',
        ]);

        $voucher->update($request->only('code', 'discount_value'));
        return response()->json($voucher);
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return response()->json(null, 204);
    }
}