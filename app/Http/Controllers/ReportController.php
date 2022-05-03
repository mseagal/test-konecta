<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function stockReport()
    {
        $products = Product::orderBy('stock','desc')->limit(3)->get();
        return view('pages.reports.stock-products',['data'=>$products]);
    }

    public function mostProductsSold()
    {
        $sales = Sale::select('products.id as product_id','products.name as product_name')
                    ->selectRaw('SUM(quantity) as total')
                    ->join('products','sales.product_id','products.id')
                    ->groupBy('products.id','product_name')
                    ->orderBy('total','desc')
                    ->limit(3)
                    ->get();
        return view('pages.reports.most-products-sold',['data'=>$sales]);
    }
}
