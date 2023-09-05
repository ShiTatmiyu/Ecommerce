<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;
use App\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $duplicate =  Cart::where('product_id', $request->product_id)->first();

        if($duplicate) {
            return redirect('/cart')->with('error', 'The item has already in carts');
        }
        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'qty' => 1
        ]);
        return redirect('/cart')->with('success', 'The item has successfuly added to the carts');
    }

    public function update(Request $request, $id)
    {

        Cart::where('id', $id)->update([
            'qty' => $request->quantity
        ]);
        return response()->json([
            'success' => true
        ]);
    }

    public function delete($id)
    {
        DB::table('carts')->delete($id);
        return redirect()->to('/cart')->with('remove', 'The item has successfuly removed from the carts');
    }
}

