<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Kendaraan;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Order";
        $order = Order::with('customer')->get();
        return view('petugas.order.index', compact('order', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Order";
        $customer = Customer::all();
        $kendaraan = Kendaraan::all();

        return view('petugas.order.ordercreate', compact('customer', 'kendaraan', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi input
        $request->validate([
            'id_customer' => 'required',
            'Tanggal' => 'required|date',
            'id_kendaraan' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $order = Order::create([
            'id_customer' => $request->id_customer,
            'Tanggal' => $request->Tanggal,
        ]);

        OrderDetail::create([
            'id_order' => $order->id,
            'id_kendaraan' => $request->id_kendaraan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('admin.order');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $totalPrice = 0;
        $title = "show Order Detail";
        $order = Order::findOrfail($id);

        // Hitung total harga
        foreach ($order->orderDetails as $detail) {
            $totalPrice += $detail->kendaraan->harga * $detail->Jumlah;
        }

        return view('petugas.order.showorderdetail', compact('order', 'title', 'totalPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit Order';
        $order = Order::findOrFail($id);
        $customer = Customer::all();

        return view('petugas.order.orderedit', compact('customer', 'order', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_customer' => 'required',
            'Tanggal' => 'required|date',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'id_customer' => $request->id_customer,
            'Tanggal' => $request->Tanggal,
        ]);

        return redirect()->route('admin.order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return redirect()->route('admin.order');
    }
}
