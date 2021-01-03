<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryList=DB::select('select * from categories');
        $dataList=DB::select('select * from hotels');

        //print_r($dataList);
        //exit();
        return view('admin.hotels',['dataList'=>$dataList,'categoryList'=>$categoryList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataList=DB::table('categories')->get();
        return view('admin.hotel_add',['dataList'=>$dataList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data= new Hotel;
        $data->category_id = $request->input('category_id');
        $data->title = $request->input('title');
        //$data->image = Storage::putFile('images',$request->file('image')); //file upload

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time(). '.'.$extension;
            $file->move('assets/images/hotels/',$filename);
            $data->image=$filename;
        }else{
            $data->image = '';
        }

        $data->description =$request->input('description');
        $data->keywords = $request->input('keywords');
        $data->slug = $request->input('slug');
        $data->details = $request->input('details');
        $data->star = $request->input('star');
        $data->phone = $request->input('phone');
        $data->fax = $request->input('fax');
        $data->email = $request->input('email');
        $data->city = $request->input('city');
        $data->country= $request->input('country');
        $data->address = $request->input('address');
        $data->user_id = Auth::id();
        $data->status = $request->input('status');

        $data->save();

        return redirect()->route('hotels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel, $id)
    {
        $data=Hotel::find($id);
        // $data=DB::table('categories')->get()->where('id',$id);
        $dataList=Category::all();
        return view('admin.hotel_edit',['data'=>$data,'dataList' => $dataList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel ,$id)
    {
        $data = Hotel::find($id);

        $data->category_id = $request->input('category_id');
        $data->title = $request->input('title');
        //$data->image = Storage::putFile('images',$request->file('image'));

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time(). '.'.$extension;
            $file->move('assets/images/hotels/',$filename);
            $data->image=$filename;
        }else{
            $data->image = '';
        }

        $data->description =$request->input('description');
        $data->keywords = $request->input('keywords');
        $data->slug = $request->input('slug');
        $data->details = $request->input('details');
        $data->star = $request->input('star');
        $data->phone = $request->input('phone');
        $data->fax = $request->input('fax');
        $data->email = $request->input('email');
        $data->city = $request->input('city');
        $data->country= $request->input('country');
        $data->address = $request->input('address');
        $data->user_id = Auth::id();
        $data->status = $request->input('status');

        $data->save();

        return redirect()->route('hotels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel,$id)
    {
        DB::table('hotels')->where('id','=',$id)->delete();
        return redirect()->route('hotels');
    }
}
