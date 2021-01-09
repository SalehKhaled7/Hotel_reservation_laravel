<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data=FrontSetting::first();
        if ($data==null){
            $data=new FrontSetting;
            $data->index_about_us="default about us";
            $data->save();
            $data=FrontSetting::first();
        }
        return view('Admin.Front_setting',['data'=>$data]);
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
     * @param  \App\Models\FrontSetting  $frontSetting
     * @return \Illuminate\Http\Response
     */
    public function show(FrontSetting $frontSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontSetting  $frontSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontSetting $frontSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontSetting  $frontSetting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, FrontSetting $frontSetting,$id)
    {
        $data = FrontSetting::find($id);
        if ($request->file('slider_img1') != null){
            $data->slider_img1 = Storage::putFile('public/images/frontSetting',$request->file('slider_img1'));
        }
        if ($request->file('slider_img2') != null){
            $data->slider_img2 = Storage::putFile('public/images/frontSetting',$request->file('slider_img2'));
        }
        if ($request->file('index_hotel_bg') != null){
            $data->index_hotel_bg = Storage::putFile('public/images/frontSetting',$request->file('index_hotel_bg'));
        }

        $data->index_about_us = $request->input('index_about_us');

        if ($request->file('index_about_us_img') != null){
            $data->index_about_us_img = Storage::putFile('public/images/frontSetting',$request->file('index_about_us_img'));
        }
        if ($request->file('index_review_bg') != null){
            $data->index_review_bg = Storage::putFile('public/images/frontSetting',$request->file('index_review_bg'));
        }
        $data->save();
        return back()->with('info','settings updated successfully . ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontSetting  $frontSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontSetting $frontSetting)
    {
        //
    }
}
