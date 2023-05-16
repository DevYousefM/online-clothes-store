<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function new_orders()
    {
        $orders = Order::all()->where("order_status", "pending");
        return view("admin.new_orders", ["orders" => $orders]);
    }
    public function users_orders()
    {
        $orders = Order::all()->where("order_status", "pending");
        return view("admin.users_orders", ["orders" => $orders]);
    }
    public function companies_orders()
    {
        $orders = Order::all()->where("order_status", "pending");
        return view("admin.companies_orders", ["orders" => $orders]);
    }
    public function reviewed_orders()
    {
        $orders = Order::all()->where("order_status", "proccess");
        return view("admin.reviewed_orders", ["orders" => $orders]);
    }
    public function completed_orders()
    {
        $orders = Order::all()->where("order_status", "completed");
        return view("admin.completed_orders", ["orders" => $orders]);
    }
    public function update_order(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->update([
            "order_status" => $request->order_status,
        ]);
        if ($request->shipment_code) {
            $order->update([
                "shipment_code" => $request->shipment_code
            ]);
        }
        Mail::to("elcaptain.yousef.official@gmail.com")->send(new OrderShipped("text"));
        return back();
    }
}
