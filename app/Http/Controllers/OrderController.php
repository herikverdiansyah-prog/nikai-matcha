<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; 

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.dashboard', compact('orders'));
    }

    public function store(Request $request)
    {
        $productName = $request->input('product_name');
        $price = $request->input('price');

        // 1. Simpan data ke database dengan status pending
        $order = Order::create([
            'product_name' => $productName,
            'price' => $price,
            'status' => 'pending', 
        ]);

        // 2. Kembalikan respons sukses beserta ID Order untuk diarahkan ke halaman invoice buatan sendiri
        return response()->json([
            'success' => true,
            'order_id' => $order->id
        ]);
    }

    public function complete($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'completed']);
        return redirect()->back()->with('success', 'Pesanan telah selesai!');
    }
}
