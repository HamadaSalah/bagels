<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Messages;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        return view('Admin.About.edit', compact('about'));
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
    public function store(Request $request)
    {
        //
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
        //
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
            'desc' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'value' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'pharma_products' => 'required',
            'rated_by' => 'required',
            'email' => 'required'
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

        About::first()->update($requestData);
        return redirect()->route('index')->with('success', 'About Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function messages() {
        $messages = Messages::all();
        return view('Admin.About.messages', compact('messages'));
    }
    public function messagesDelete($id) {
        $slider = Messages::findOrFail($id);
        $slider->delete();
        return redirect()->route('messages')->with('success', 'Message Deleted Successfully');

    }
    public function order() {
        $orders = Order::latest()->get();
        return view('Admin.Order.index', compact('orders'));
    }
}
