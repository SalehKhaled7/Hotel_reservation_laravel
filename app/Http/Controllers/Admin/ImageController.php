<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Image;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create($hotel_id,$room_id)
    {
       $room=Room::find($room_id);
       $hotel=Hotel::find($hotel_id);
       $imageList=Image::all()->where('room_id',$room_id);

       return view('admin.room.image.image_add',['room'=>$room,'hotel'=>$hotel,'imageList'=>$imageList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,$hotel_id,$room_id)
    {
        $room=Room::find($room_id);
        $hotel=Hotel::find($hotel_id);

        $data= new Image;
        $data->room_id = $room_id;
        $data->title = $request->input('title');

        //$data->image = Storage::putFile('images',$request->file('image')); //file upload
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time(). '.'.$extension;
            $file->move('assets/images/hotels/'.$hotel->title.'/'.$room->title,$filename);
            $data->image=$filename;
        }else{
            $data->image = '';
        }

        $data->save();

        return redirect()->route('admin_image_add',['room_id'=>$room_id,'hotel_id'=>$hotel_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Image $image,$hotel_id,$room_id,$id)
    {
        DB::table('images')->where('id','=',$id)->delete();
        return redirect()->route('admin_image_add',['hotel_id'=>$hotel_id,'room_id'=>$room_id]);
    }
}
