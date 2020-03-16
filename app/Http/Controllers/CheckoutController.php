<?php

namespace App\Http\Controllers;

use App\Order;
use App\Products;
use App\SubOrder;
use Illuminate\Http\Request;
use Cart;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{

    public function index()
    {
        $post["product"] = Products::all();
        return view('pages.checkout', $post);
    }

    public function invoice(Request $request) {

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Gets the data being create by the User
        $this->validate($request, [
            'userid' => 'required',
            'email' => 'required',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal' => 'required',
            'phone' => 'required|numeric|digits:11',
        ]);

        //Create the data
        $post = new Order;
        $post->user_id = $request->userid;
        $post->email = $request->email;
        $post->name = $request->name;
        $post->address = $request->address;
        $post->city = $request->city;
        $post->postal = $request->postal;
        $post->phone = $request->phone;
        $post->payment_status = 0;
        $post->count = Cart::count();
        $post->grandtotal = Cart::total();
        $post->save();

        foreach(Cart::content() as $items) {
            $suborder = new SubOrder();
            $suborder->order_id = $post->id;
            $suborder->product_id = $items->id;
            $suborder->qty = $items->qty;
            $suborder->price = $items->price;
            $suborder->save();

            Products::where('id', $suborder->product_id)->decrement('product_quantity', $suborder->qty);
        }

        Cart::destroy();
        Alert::success('Success', 'Your order has been placed');
        return redirect('pages.thankyou');
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
