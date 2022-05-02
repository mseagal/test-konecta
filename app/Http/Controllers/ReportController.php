<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function stockReport()
    {
        return view('pages.reports.stock-products');
    }

    public function mostProductsSold()
    {
        return view('pages.reports.most-products-sold');
    }
}
