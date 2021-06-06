<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Cart;
use DB;
use Session;
use Auth;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function getCheckout()
    {
        if (!Session::has('cart'))
        {
            return view('product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('pages.cart.checkout', ['total' => $total]);
    }
    public function postCheckout(Request $request)
    {
        if(!Session::has('cart'))
        {
            return redirect()->route('product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $order = new Order();
        $order->cart = serialize($cart);
        $order->name = $request->input("name");
        $order->address = $request->input('address');
        $order->psc = $request->input('psc');
        $order->delivery = $request->input('delivery');
        $order->payment = $request->input('payment');
        Auth::user()->orders()->save($order);
        return redirect()->route('product.shoppingCart');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
