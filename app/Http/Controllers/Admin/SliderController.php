<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('Admin.Slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Slider.create');
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
            'head' => 'required',
            'img' => 'required',
            'desc' => 'required',
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

        Slider::create($requestData);
        return redirect()->route('slider.index')->with('success', 'SLider Addedd Successfully');
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
        $slider = Slider::findOrFail($id);
        return view('Admin.Slider.edit', compact('slider'));
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
        {
            $vlidation = $request->validate([
                'head' => 'required',
                'desc' => 'required',
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
    
                $slider = Slider::findOrFail($id);
            $slider->update($requestData);
            return redirect()->route('slider.index')->with('success', 'SLider Edited Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'SLider Deleted Successfully');
    }
}
