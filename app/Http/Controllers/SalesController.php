<?php

namespace App\Http\Controllers;

use App\Http\Requests\sales\CreateSaleRequest;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::orderBy('created_at','DESC')->get();
        return view('pages.sales.index',compact('sales'));
    }

    public function store(CreateSaleRequest $request)
    {
        Sale::create($request->all());
        $sales = Sale::orderBy('created_at','DESC')->get();
        return redirect()->route('sales.index')->with('sales',$sales)->with('success','Venta realizada correctamente');
    }
}
