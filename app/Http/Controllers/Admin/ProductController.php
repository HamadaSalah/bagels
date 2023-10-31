<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('Admin.Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Admin.Product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vlidation = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'img' => 'required',
        ]);
        $requestData = $request->except('_token');
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = 'sliderIMG'.'_'.time().'.'.$ext;
            $destinationPath = public_path().'/assets/img' ;
            $storagePath = Storage::disk('public_uploads')->put('/images', $file) ;
            $storageName = basename($storagePath);
            $requestData['img'] = $storageName;
        }

        Product::create($requestData);
        return redirect()->route('product.index')->with('success', 'Product Addedd Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('Admin.Product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vlidation = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        $requestData = $request->except('_token');
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = 'sliderIMG'.'_'.time().'.'.$ext;
            $destinationPath = public_path().'/assets/img' ;
            $storagePath = Storage::disk('public_uploads')->put('/images', $file) ;
            $storageName = basename($storagePath);
            $requestData['img'] = $storageName;
        }

        $product = Product::findOrFail($id);

        $product->update($requestData);

        return redirect()->route('product.index')->with('success', 'Product Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Product::findOrFail($id);
        $slider->delete();
        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
    }
}
