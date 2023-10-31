<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testmonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestmonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Testmonials::all();
        return view('Admin.Testmonials.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Testmonials.create');    
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
            'img' => 'required',
        ]);
        $requestData = $request->except('_token');
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = 'testmon'.'_'.time().'.'.$ext;
            $destinationPath = public_path().'/assets/img' ;
            $storagePath = Storage::disk('public_uploads')->put('/images', $file) ;
            $storageName = basename($storagePath);
            $requestData['img'] = $storageName;
        }

        Testmonials::create($requestData);
        return redirect()->route('testmonials.index')->with('success', 'Testmonial Addedd Successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Testmonials::findOrFail($id);
        $slider->delete();
        return redirect()->route('testmonials.index')->with('success', 'Testmonails Deleted Successfully');
    }
}
