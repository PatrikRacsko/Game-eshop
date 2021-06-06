<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use DB;
use Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::filter($request)->get();
        return view('pages.product')->with('products', $products);
    }
    public function sortDesc()
    {
        $dbs = DB::select('SELECT * FROM products ORDER BY price DESC');
        return view('pages.product')->with('products', $dbs);
    }
    public function sortAsc()
    {
        $dbs = DB::select('SELECT * FROM products ORDER BY price ASC');
        return view('pages.product')->with('products', $dbs);
    }
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('home');
    }
    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart')->with('success', 'Kvantita produktu bola znizena');
    }
    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart')->with('success', 'Produkt bol vymazany');

    }
    public function getCart()
    {
        if (!Session::has('cart'))
        {
            return view('pages.cart.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('pages.cart.shoppingCart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
  
}
