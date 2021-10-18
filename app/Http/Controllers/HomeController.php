<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Models\Category;
use App\Models\Models\Customer;
use App\Models\Models\Invoice;
use App\Models\Models\InvoiceDetail;
use App\Models\Models\Payment;
use App\Models\Models\PaymentDetail;
use App\Models\Models\Product;
use App\Models\Models\Purchase;
use App\Models\Supplier;
use App\Models\Models\Unit;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $payment=Payment::all();
        return view('home',compact('payment'));
    }

    public function user()
    {
        $data['alldata'] = user::all();
       return view('view-user', $data);
    }



}
