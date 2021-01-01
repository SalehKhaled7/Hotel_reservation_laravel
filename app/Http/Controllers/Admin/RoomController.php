<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($hotel_id)
    {
        $rooms=DB::table('rooms')->get()->where('hotel_id',$hotel_id);
        $hotel=DB::table('hotels')->get()->where('id',$hotel_id)->first();
        //print_r($hotel);
        //print_r($rooms);
        //exit();
        return view('admin.room.rooms',['rooms'=>$rooms ,'hotel'=>$hotel ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($hotel_id)
    {
        $hotel=DB::table('hotels')->get()->where('id',$hotel_id)->first();
        return view('admin.room.room_add',['hotel'=>$hotel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,$hotel_id)
    {
        $data= new Room;
        $data->hotel_id = $hotel_id;
        $data->title = $request->input('title');
        $data->type = $request->input('type');
        $data->description =$request->input('description');
        //$data->image = Storage::putFile('images',$request->file('image')); //file upload
        $data->price = (float)$request->input('price');
        $data->beds = $request->input('beds');
        $data->view = $request->input('view');
        $data->tv = $request->input('tv');
        $data->wifi = $request->input('wifi');
        $data->air_conditioner = $request->input('air_conditioner');
        $data->details = $request->input('details');
        $data->available = $request->input('available');

        $data->save();

        return redirect()->route('rooms',['hotel_id'=>$hotel_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($hotel_id,$id)
    {
        $hotel=DB::table('hotels')->get()->where('id',$hotel_id)->first();
        $room=DB::table('rooms')->get()->where('id',$id)->first();
        //print_r($id);
        //exit();
        return view('admin.room.room_edit',['hotel'=>$hotel,'room'=>$room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Room $room,$hotel_id,$id)
    {
        $data = Room::find($id);
        $data->title = $request->input('title');
        $data->type = $request->input('type');
        $data->description =$request->input('description');
        //$data->image = Storage::putFile('images',$request->file('image')); //file upload
        $data->price = (float)$request->input('price');
        $data->beds = $request->input('beds');
        $data->view = $request->input('view');
        $data->tv = $request->input('tv');
        $data->wifi = $request->input('wifi');
        $data->air_conditioner = $request->input('air_conditioner');
        $data->details = $request->input('details');
        $data->available = $request->input('available');

        $data->save();

        return redirect()->route('rooms',['hotel_id'=>$hotel_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Room $room,$hotel_id,$id)
    {
        DB::table('rooms')->where('id','=',$id)->delete();
        return redirect()->route('rooms',['hotel_id'=>$hotel_id]);
    }
}
