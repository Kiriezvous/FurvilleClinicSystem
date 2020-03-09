<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class ServicesController extends Controller
{

    public function index()
    {
        $posts = Services::orderBy('id', 'desc')->paginate(10);
        return view('admin.services.index')->with('posts', $posts);
    }

    public function store(Request $request)
    {
        //dd($request);
        // Gets the data being create by the User
        $this->validate($request, [
            'service_name' => 'required',
            'service_description' => 'required',
            'service_type' => 'required',
            'service_price' => 'required',
        ]);


        //Create the data
        $post = new Services;
        $post->service_name = $request->service_name;
        $post->service_description = $request->service_description;
        $post->service_type = $request->service_type;
        $post->service_price = $request->service_price;
        $post->save();

        Alert::success('Added Service', 'You successfully added a new service');

        //Redirect
        return redirect(route('services.index'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'service_name' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',
        ]);

        //Update Post
        $post = Services::find($id);
        $post->service_name = $request->service_name;
        $post->service_description = $request->service_description;
        $post->service_type = $request->service_type;
        $post->service_price = $request->service_price;
        $post->save();

        Alert::success('Updated Service', 'You successfully updated the service');
        return redirect(route('services.index'));
    }

    public function destroy($id)
    {
        // Looks for the post ID user from the database
        $post = Services::find($id);

        // Delete the specific post using the ID user from the database
        $post->delete();

        Alert::success('Deleted Service', 'You successfully removed the service');
        return redirect(route('services.index'));
    }
}
