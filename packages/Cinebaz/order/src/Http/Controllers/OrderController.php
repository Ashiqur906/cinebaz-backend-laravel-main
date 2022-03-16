<?php

namespace Cinebaz\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Order\DataTables\OrderDT;
use Illuminate\Http\Request;
use Cinebaz\Order\Models\Order;
use Validator;
use PDF;



class OrderController extends Controller
{

    public function __construct()
    {
        //$this->middleware('outlet');
    }



    public function index(OrderDT $dataTable)
    {

        $mdata = null;
        $fdata = null;

        return $dataTable->render('order::index', compact('fdata', 'mdata'));
    }

    public function details($id){
    //    return Order::find($id);
        return view('order::show',[
           'order' => Order::find($id)
        ]);
    }

    public function report($id){
        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('pdf.invoice', compact('order'));
        return $pdf->stream($order->invoice_id . '.pdf');
    }
}
