<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Doctor;
use App\Patients;
use App\Products;
use App\Staff;
use App\Http\Controllers\Controller;
use App\User;
use PDF;


class ReportsController extends Controller
{
    public function list_view(){

        $users = User::all();
        return view('admin.reports.list_users')->with('users', $users);
    }

    public function reports()
    {
        $users = Patients::all();

        $pdf = PDF::loadview('admin.reports.pdf.users', compact('users'));

        return $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->stream('list_products.pdf');

    }


}
