<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function add_product()
    {
        $catagories =  Catagory::all();
        return view("admin.add_product", ["catagories" => $catagories]);
    }
    public function edit_product($id)
    {
        $catagories =  Catagory::all();
        $product = Product::findOrFail($id);
        return view("admin.edit_product", ["product" => $product, "catagories" => $catagories]);
    }
    public function update_product(Request $request)
    {
        // Validation
        $request->validate([
            "title" => "required",
            "description" => "required",
            "price" => "required",
            "percent" => "required",
            "quantity" => "required",
            "product_image" => "mimes:jpg,bmp,png",
            "product_video" => "file|mimetypes:video/mp4,video/mpeg",
        ]);
        if ($request->catagory === "Select...") {
            return redirect()->back()->with("cata", "Please Select Catagory");
        }
        // Update Media
        $product = Product::findOrFail($request->id);

        if ($request->product_image) {
            File::delete("app/$product->product_img");
            $img = $request->file("product_image")->store("product_images", "public");
        }
        if ($request->product_video) {
            File::delete("app/$product->product_vid");
            $vid = $request->file('product_video')->store('product_videos', "public");
        }

        // Update In DB
        $product->update([
            "title" => $request->title,
            "description" => $request->description,
            "catagory" => $request->catagory,
            "price" => $request->price,
            "percent" => $request->percent,
            "quantity" => $request->quantity,
            "product_img" => isset($img) ? $img : $product->product_img,
            "product_vid" => isset($vid) ? $vid : $product->product_vid
        ]);
        return redirect("product_page/$request->id")->with("done_add", "Product updated successfully");
    }
    public function del_product($id)
    {
        $product = Product::findOrFail($id);
        File::delete("app/$product->product_img");

        File::delete("app/$product->product_vid");
        $product->delete();
        return redirect("catagory/$product->catagory")->with("done_del", "Product deleted successfully");
    }
    public function catagory($name)
    {
        $catagories = Catagory::all();
        $products = Product::all()->where("catagory", $name);
        return view("admin.catagory_page", ["catagories" => $catagories, "products" => $products, "catagory_name" => $name]);
    }
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            "title" => "required",
            "description" => "required",
            "price" => "required",
            "percent" => "required",
            "quantity" => "required",
            "product_image" => "required|mimes:jpg,bmp,png",
            "product_video" => "file|mimetypes:video/mp4,video/mpeg",
        ]);
        if ($request->catagory === "Select...") {
            return redirect()->back()->with("cata", "Please Select Catagory");
        }
        // Store Files
        $img = $request->file('product_image')->store('product_images', "public");
        if ($request->product_video) {
            $vid = $request->file('product_video')->store('product_videos', "public");
        }
        // Store Product
        Product::create([
            "title" => $request->title,
            "description" => $request->description,
            "catagory" => $request->catagory,
            "price" => $request->price,
            "percent" => $request->percent,
            "quantity" => $request->quantity,
            "product_img" => $img,
            "product_vid" => isset($vid) ? $vid : ""
        ]);
        return redirect()->back()->with("done_add", "Product added successfully");
    }
    public function product_page($id)
    {
        $product = Product::all()->where("id", $id);
        $catagories = Catagory::all();
        return view("admin.product_page", ["catagories" => $catagories, "product" => $product]);
    }
}
