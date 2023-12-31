<?php

namespace App\Http\Controllers;

use App\Product;
use App\category;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::where ('name', 'LIKE', '%'. $request->search.'%')->paginate(9);
        return view( 'shop.index', compact('products', 'categories',));
    }

    public function category($id)
    {
        $categories = Category::all();
        $products = product::where('category_id', $id)->paginate(6);
        return view('shop.index', compact('products', 'categories', 'id'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view( 'shop.show', compact('product'));
    }

}
