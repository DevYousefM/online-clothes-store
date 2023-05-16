<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Cart;
use App\Models\Districts;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Session;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        return view("home.checkout", ["product_id" => $id,  "quantity" => $request->quantity]);
    }
    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $price = $product->price - ($product->price * $product->percent / 100);
        $total = $price * $request->qtn;


        Order::create([
            "name" => $request->f_name . " " . $request->l_name,
            "email" => $request->email,
            "qtn" => $request->qtn,
            "product_img" => $product->product_img,
            "user_type" => "Guest",
            "product_title" => $product->title,
            "phone_number" => $request->number,
            'address' => $request->address . "," . $request->region . "," .  $request->district,
            'product_id' => $id,
            'payment_status' => "On delivary",
            'total_price' => $total,
        ]);
        Mail::to($request->email)->send(new OrderShipped("text"));
        Session::flash('success', 'Order completed successfully, check your mailbox!');
        return redirect()->route("index");
    }
    public function make_order()
    {
        $user = User::findOrFail(Auth::user()->id);
        if ($user->phone_number == null) {
            return redirect()->route("fill_informations");
        } else {
            return redirect()->route("complete_order");
        }
    }
    public function complete_order()
    {
        return view("home.complete_order");
    }
    public function store_order(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $cart = Cart::all()->where("user_id", $user->id);

        if ($request->region === "Seleziona la regione...") {
            return redirect()->back()->with("region", "Si prega di selezionare la regione");
        }
        if ($request->district === "Seleziona la città...") {
            return redirect()->back()->with("district", "Si prega di selezionare il distretto");
        }
        foreach ($cart as $item) {
            $total_price = $item->quantity * $item->product_price - ($item->quantity * $item->product_price * $item->product_percent) / 100;
            Order::create([
                "user_id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "qtn" => $item->quantity,
                "product_img" => $item->product_img,
                "user_type" => $user->user_type,
                "product_title" => $item->product_title,
                "phone_number" => $user->phone_number,
                'address' => $request->address . "," . $request->region . "," .  $request->district,
                'product_id' => $item->product_id,
                'payment_status' => "On delivary",
                'total_price' => $total_price,
            ]);
            $item->delete();
        }
        // Mail::to($user->email)->send(new OrderShipped());
        return redirect()->route("index")->with("result", "Order completed successfully, check your mailbox!");
    }
}
