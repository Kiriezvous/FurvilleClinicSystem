<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Order;
use App\Patients;
use App\Products;
use App\SubOrder;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    public function index()
    {
        $data["Products"] = Products::all();
        $data["User"] = User::all();
        $data["Patients"] = Patients::all();
        $data["SubOrders"] = SubOrder::all();


        $inventory = Products::where('product_quantity', '<=', '10')->get();



        $subOrder = SubOrder::all();
        $product_array = array();

        $subArray = array();
        $subQTY = array();
        $subPrice = array();

        foreach($subOrder as $s) {
            array_push($subArray, $s->product_id);
            array_push($subQTY, $s->qty);
            array_push($subPrice, $s->price);
            $product = Products::where('id', $s->product_id)->get();

            foreach($product as $p) {
                array_push($product_array, $p->product_name);
            }
        }

        $totalcost = array();

        for($i = 0; $i < count($subOrder); $i++) {
            array_push($totalcost, $subQTY[$i] * $subPrice[$i]);
        }

//        dd($totalcost);

        $overalltotal = array_sum($totalcost);

//        dd($overalltotal);
        $percentagetotalcost = array();



        for($i = 0; $i < count($subOrder); $i++) {
            $value = $totalcost[$i] / $overalltotal;
            $value = $value * 100;
            array_push($percentagetotalcost, $value);
        }


        sort($percentagetotalcost);
//        dd($percentagetotalcost);

        $cmpercentage = array_sum($percentagetotalcost);

        $category = array();

        for($i = 0; $i < count($subOrder); $i++) {
            if($percentagetotalcost[$i] >= 50) {
                $categorize = "Category A";
            } else if($percentagetotalcost[$i]  >= 35) {
                $categorize = "Category B";
            } else {
                $categorize = "Category C";
            }

            //dd($percentagetotalcost);
            array_push($category, $categorize);
        }

     //   dd($subOrder, $subPrice, $subQTY, $totalcost, $overalltotal, $percentagetotalcost, $cmpercentage);



        $months = array(
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July ',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        );

        // Get Orders Pending
        $order_month = Order::where('status', 'Confirmed')->get();
        $store_order = array();

        foreach($order_month as $order_all) {
            array_push($store_order, date('Y-m', strtotime($order_all->created_at)));
        }

        // Calculate Orders Sales
        $total_order_sales = array();

        $store_order_data = array_values(array_unique($store_order));

//        dd($store_order_data);

        // January to December Sales Static
        for($i = 1; $i <= count($store_order_data); $i++) {
            if($i == 0 || $i == 11 ||  $i == 12) {
                $value = SubOrder::where('created_at', "like", '%2020-'.$i. '%')->sum('price');
            } else {
                $value = SubOrder::where('created_at', "like", '%2020-0'.$i. '%')->sum('price');

            }

            array_push($total_order_sales, $value);
        }

        ($total_order_sales);

        //What is Trader SMA input for me to show
//        $order_forecast = trader_sma($total_order_sales, (count($total_order_sales)));

//        dd($order_forecast);


// ----------------------------------------------------------------------------- //

        // Dynamic Data

        $overallmonths = Order::where('payment_status', 0)->get();
        $store_month = array();

        foreach ($overallmonths as $all) {
            array_push($store_month, date('Y-m', strtotime($all->created_at)));
        }
        $getMonth = array_values(array_unique($store_month));

        $total_sales = array();

        foreach($getMonth as $m) {
            $value = Order::where('created_at', "like", '%'.$m.'%')->sum('grandtotal');
            array_push($total_sales, $value);
        }

        $user_input = 0;


        $forecasted = trader_sma($total_sales, (count($total_sales) - $user_input));
//        ->with('order_forecast', $order_forecast);
//            ->with('forecasted', $forecasted)

//        ABC



        // Get Orders Pending
        $order_month = Order::where('status', 'Confirmed')->get();
        $store_order = array();

        foreach($order_month as $order_all) {
            array_push($store_order, date('Y-m', strtotime($order_all->created_at)));
        }

        //dd(count(array_reverse($percentagetotalcost)));

        //dd($total_sales);

        return view('admin.dashboard.index', $data)
            ->with('total_order_sales', $total_order_sales)
            ->with('order_forecast', $forecasted)
            ->with('totalsales', $total_sales)
            ->with('categorize', $category)
            ->with('totalcosting', $totalcost)
            ->with('percentage', $cmpercentage)
            ->with('order', $store_order)
            ->with('cm', $percentagetotalcost)
            ->with('overalltotalcost', $overalltotal)
            ->with('stocks', $inventory);

    }

}
