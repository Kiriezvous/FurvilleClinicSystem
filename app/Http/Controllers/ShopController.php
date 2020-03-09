<?php

namespace App\Http\Controllers;

use App\Products;
use Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $posts["Products"] = Products::inRandomOrder('id', 'desc')->paginate(6);

        return view('pages.shoppingcart', $posts);


    }

    public function store(Request $request)
    {
//        Cart::add($request->id, $request->name,1,$request->price )
//            ->associate('App\Products');
//
//        return redirect()->back()->with('success', 'Item was added to your cart');
    }

    public function show($id)
    {
        $product = Products::where('product_name', $id)->firstOrFail();
        $mightAlsoLike = Products::where('product_name', '!=', $id)->mightAlsoLike();

        return view('pages.product')->with([
            'product'=> $product,
            'mightAlsoLike' => $mightAlsoLike
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
