<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required',
        ]);
        // Store the user in the database

        $image = $request->file('img');
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . "." . $ext;
        $image->move(public_path('uploads/banner'), $imageName);
        $data = DB::table('banner')->insert([
            'img' => $imageName,
        ]);
        return back()->with('success', 'User created successfully.');
    }
    public function show()
    {
        $banner = DB::table('banner')->get();
        return view('welcome', ['banners' => $banner]);
    }
    public function showbanner()
    {
        $banner = DB::table('banner')->get();
        $product = DB::table('products')->get();
        return view('admin', ['products' => $product,'banners' => $banner]);
    }
    public function delete($id)
    {
        $banner = DB::table('banner')->where('id', $id)->first();
        File::delete(public_path('uploads/banner/' . $banner->img));
        DB::table('banner')->where('id', $id)->delete();
        return back()->with('success', 'User deleted successfully.');
    }
    public function edit($id)
    {
        $banner = DB::table('banner')->where('id', $id)->first();
        return view('editbanner', ['banner' => $banner]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'img' => 'required',
        ]);
        // Store the user in the database

        $image = $request->file('img');
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . "." . $ext;
        $image->move(public_path('uploads/banner'), $imageName);
        DB::table('banner')->where('id', $request->id)->update([
            'img' => $imageName,
        ]);
        return back()->with('success', 'User updated successfully.');
    }
    public function prostore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'img' => 'required',
        ]);
        // Store the user in the database
        $image = $request->file('img');
        $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/products'),$imageName);
        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'img' => $imageName
        ]);
        return back()->with('success', 'User created successfully.');
    }
   public function prodshow()
    {
        $product = DB::table('products')->get();
        return view('product', ['products' => $product]);
    }
    public function prodelete($id)
    {
        $id = DB::table('products')->where('id', $id)->first();
        File::delete(public_path('uploads/products/' . $id->img));
        DB::table('products')->where('id', $id)->delete();
        return back()->with('success', 'User deleted successfully.');
    }
    public function editproduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'img' => 'required',
        ]);
        // Store the user in the database
        $image = $request->file('img');
        $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/products'),$imageName);
       
        DB::table('products')->where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'img' => $imageName
        ]);
        return back()->with('success', 'User updated successfully.');
    }
    public function showproduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('editproduct', ['product' => $product]);
    }
    public function productdetails($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product-details', ['product' => $product]);
    }
    public function addcart($id)
    {
        $addcart = DB::table('cart')->insert([
            'product_id' => $id
        ]);
        return redirect()->route('cart')->with('success', 'User created successfully.');
    }
    public function cart()
    {
        $cart= DB::table('cart')->get();
        $product = DB::table('products')->get();
        $cart = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->select('cart.*', 'products.name', 'products.price', 'products.img')
            ->get();
        // dd($cart);
        return view('cart', ['cart' => $cart]);
    }
    public function deletecart($id)
    {
        DB::table('cart')->where('id', $id)->delete();
        return back()->with('success', 'User deleted successfully.');
    }
}
