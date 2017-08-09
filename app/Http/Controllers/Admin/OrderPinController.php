<?php

namespace App\Http\Controllers\Admin;

use App\OrderPinCode;
use App\PinCode;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ManageMemberController;


class OrderPinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.order-pin.index');
    }


    public function listOrderPin()
    {
        return view('admin.order-pin.list-order');
    }

    public function orderPin(Request $request)
    {
        $this->validate($request, [
            "orderName" => 'required',
            'numOrder' => 'required'
        ]);

        $orderTotal = 350000*$request->input('numOrder');

        $order = new OrderPinCode();
        $order->user_id = $request->orderName;
        $order->amount = $request->numOrder;
        $order->orderTotal = $orderTotal;
        $order->save();

        return redirect()->back()->with('status', 'Pin berhasil di pesan. Silahkan konfirmasi untuk melanjutkan proses');
    }

    public function confirmOrder(Request $request, $id)
    {
        $orderpin = OrderPinCode::where('id',$id)->first();
        $orderpin->status = 1;
        $orderpin->save();

        $countOrder = $request->input('amount');
        $userOrderId = $request->input('user_order_id');
        foreach (range(1, $countOrder) as $item) {
            $pins = 'GN-' . mt_rand(100000,999999). '-' . str_random(2);
            PinCode::create([
                'order_pin_id' => $id,
                'pinCode' => $pins
            ]);
            User::create([
                'pinCode' => $pins
            ]);
        }

        return redirect()->back()->with('success', 'Pemesanan Pin berhasil dikonfirmasi');
    }

    public function getMemberOrderName($id)
    {
        $user = User::findOrFail($id)->first();
        return $user->name;
    }


}
