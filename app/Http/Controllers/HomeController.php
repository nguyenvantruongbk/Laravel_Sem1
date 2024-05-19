<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage(){
        // select * from products
        // $products = Product::all()->toArray();

        // select * from products limit 4
        $products = Product::limit(4)->get()->toArray();
    
        return view('welcome',compact("products"));
    }

    public function about_us(){
        return view("about-us");
    }

    public function category(Category $category){
        // $category = Category::findOrFail($id);
        $category = $category->toArray();
        // select * from products where category_id = $id
        $products = Product::where("category_id",$category["id"])->get()->toArray();
        return view("category-page",compact("category","products"));
    }
    
    public function product($id){
        $product = Product::findOrFail($id);
        $product = $product->toArray();
        $relateds = Product::where("category_id",$product["category_id"])->limit(4)->get()->toArray();
        return view("product-page",compact("product","relateds"));
    }

    public function search(Request $request){
        // get param
            $search = $request->get("search");
        // query db
        $products = Product::where("name","LIKE","%$search%")->get()->toArray();
        // return view
        return view('welcome',compact("products"));
    }

    public function addToCart($id,Request $request){
        $bought_qty = $request->get("bought_qty");
        $cart = session()->has("cart")?session("cart"):[];
        if(isset($cart[$id])){
            $cart[$id] += $bought_qty;
        }else{
            $cart[$id] = $bought_qty;
        }
        session(["cart"=>$cart]);
        return redirect()->back();
    }
}
