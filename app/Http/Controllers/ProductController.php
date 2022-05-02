<?php

namespace App\Http\Controllers;

use App\Http\Requests\products\CreateProductRequest;
use App\Http\Requests\products\SupplyProductRequest;
use App\Http\Requests\products\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Category::all();
        $products = Product::all();
        return view('pages.products.index',compact('categories','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        Product::create($request->all());
        $products = Product::all();
        return back()->with('success','Producto creado correctamente')->with('products',$products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewSupply(Product $product)
    {
        return view('pages.products.supply',compact('product'));
    }

    public function supply(SupplyProductRequest $request, Product $product)
    {
        $product->stock += $request->stock;
        $product->save();
        $products = Product::all();
        return redirect()->route('products.index')
                        ->with('success','Producto actualizado correctamente')
                        ->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('pages.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $products = Product::all();
        $categories = Category::all();
        return redirect()->route('products.index')
                        ->with('success','Producto actualizado correctamente')
                        ->with('products',$products)
                        ->with('categories',$categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $products = Product::all();
        return back()->with('success','Producto eliminado correctamente')->with('products',$products);
    }
}
