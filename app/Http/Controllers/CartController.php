<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cart = Cart::content();
      return view('cart.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $add_product = Product::find($id);
        $add_to_cart = Cart::add(['id' => $add_product->id, 'name' => $add_product->name, 'qty' => 1,
        'price' => $add_product->price, 'options'=> ['image' => $add_product->image]]);
          return view('cart.index');
    }

    public function update(Request $request){
      $qty = $request->newQty;
      $rowId = $request->rowID;
      Cart::update($rowId,$qty);
    }

    public function remove($id)
    {
      Cart::remove($id);
      return view('cart.index');
    }
}
