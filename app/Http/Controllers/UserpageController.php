<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Districts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserpageController extends Controller
{
    public  function index()
    {
        $men = Product::where("catagory", "LIKE", "Men")->orderByDesc('created_at')->limit(5)->get();
        $women = Product::where("catagory", "LIKE", "Women")->orderByDesc('created_at')->limit(5)->get();
        $kids = Product::where("catagory", "LIKE", "Kids")->orderByDesc('created_at')->limit(5)->get();
        $accessories = Product::where("catagory", "LIKE", "Accessories")->orderByDesc('created_at')->limit(5)->get();
        $products = Product::all();

        return view('home.main', ["men" => $men, "accessories" => $accessories,  "women" => $women, "kids" => $kids, "products" => $products]);
    }
    public function single_product($id)
    {
        $product = Product::findOrFail($id);
        return view("home.single_product", ["product" => $product]);
    }
    public function getProducts()
    {
        $products = Product::paginate(3);
        return view("home.products", ["products" => $products]);
    }
    public function single_catagory($name)
    {
        $products = Product::where("catagory", "LIKE", "%$name")->paginate(9);
        return  view("home.catagory", ["products" => $products]);
    }
    public function add_to_cart($id)
    {
        if (isset(Auth::user()->id)) {
            if ($id) {
                $user_carts = Cart::where("user_id", Auth::user()->id)->get();
                if (count($user_carts->where("product_id", $id)) > 0) {
                    return redirect()->back()->with("result", "The product already exists in the cart");
                } else {
                    $product = Product::findOrFail($id);
                    Cart::create([
                        "product_id" => $id,
                        "user_id" => Auth::user()->id,
                        'product_price' => $product->price,
                        'product_title' => $product->title,
                        'product_percent' => $product->percent,
                        'product_img' => $product->product_img,
                        'product_description' => $product->description,
                        "quantity" => 1,
                        "total_price" => $product->price,
                    ]);
                    return redirect()->back()->with("result", "Product added to cart successfully");
                }
            }
        } else {
            return redirect()->back()->with("result", "The product already exists in the cart");
        }
    }
    public function add_cart(Request $request)
    {
        if ($request) {
            $user_carts = Cart::where("user_id", Auth::user()->id)->get();
            if (count($user_carts->where("product_id", $request->id)) > 0) {
                return redirect()->back()->with("result", "The product already exists in the cart");
            } else {
                $product = Product::findOrFail($request->id);
                Cart::create([
                    "product_id" => $request->id,
                    "user_id" => Auth::user()->id,
                    'product_title' => $product->title,
                    'product_description' => $product->description,
                    'product_percent' => $product->percent,
                    'product_price' => $product->price,
                    'product_img' => $product->product_img,
                    "quantity" => $request->quantity,
                    "total_price" => $product->price * $request->quantity,
                ]);
                return redirect()->back()->with("result", "Product added to cart successfully");
            }
        }
    }
    public function cart()
    {
        if (isset(Auth::user()->id)) {
            $cart = Cart::all()->where("user_id", Auth::user()->id);
            return view("home.cart", ["cart" => $cart]);
        } else {
            return view("login");
        }
    }
    public function fill_informations()
    {

        return view("home.fill_informations");
    }
    public function del_cart($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->back()->with("result", "Product successfully removed from cart");
    }
    public function update_cart(Request $request)
    {
        $cart = Cart::findOrFail($request->id);
        $cart->update([
            "quantity" => $request->quantity
        ]);
        return redirect()->back()->with("result", "Product quantity updated successfully");
    }
    public function complete_user_info(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            "number" => "required",
            "vat_code" => "required",
            "postal_code" => "required",
        ]);
        if (
            $user->update(
                [
                    "phone_number" => $request->number,
                    "vat_code" => $request->vat_code,
                    "postal_code" => $request->postal_code,
                ]
            )
        ) {
            return redirect()->route("complete_order");
        } else {
            return redirect()->route("index");
        }
    }
}
