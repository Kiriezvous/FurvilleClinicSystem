<?php

namespace App\Http\Controllers;

use App\Products;
use Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $product = Products::inRandomOrder('id', 'desc');
        $mightAlsoLike = Products::mightAlsoLike();
        return view('pages.cart')->with([
            'product'=> $product,
            'mightAlsoLike' => $mightAlsoLike
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success', 'Item is already in your cart');
        }

        Cart::add($request->id, $request->name,1,$request->price )
            ->associate('App\Products');

        return view('pages.cart')->with('success', 'Add the quantity');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        $qty = $request->qty;
        $prodID = $request->prodID;
        //dd(Cart::content());
        $product = Products::findOrFail($prodID);
        $stock = $product->product_quantity;


        if($qty > $stock) {
            if($qty <= 0) {
                return back()->with('error', 'Your quantity is less than the product inventory');
            }
            Cart::update($id, $request->qty);

            return back()->with('success', 'Quantity updated');
        } else {
            return back()->with('error', 'Your quantity is more than the product inventory');
        }
    }

    public function destroy($id)
    {
        Cart::remove($id);

            return back()->with('success', 'Item has been removed');
    }

    public function wishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success', 'Item is already in your wishlist');
        }

        Cart::instance('wishlist')->add($item->id, $item->name,1,$item->price )
            ->associate('App\Products');

        return redirect()->back()->with('success', 'Item was added in your Wishlist');
    }

    public function destroyWishlist($id)
    {
        Cart::instance('wishlist')->remove($id);

        return back()->with('success', 'Item has been removed');
    }

    public function movetoCart($id)
    {
        $item = Cart::instance('wishlist')->get($id);

        Cart::instance('wishlist')->remove($id);

        $duplicates = Cart::instance('default')->search(function($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success', 'Item is already in your Cart');
        }

        Cart::instance('default')->add($item->id, $item->name,1,$item->price )
            ->associate('App\Products');

        return redirect()->back()->with('success', 'Item was added to your cart');
    }
}
