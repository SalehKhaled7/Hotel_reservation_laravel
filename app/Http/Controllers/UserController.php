<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.user.user_profile');
    }
    public  function reviews(){
        $reviews = Review::all()->where('user_id',Auth::id());
        return view('home.user.user_reviews',['reviews'=>$reviews]);
    }

    public function delete_review($id){
        $review = Review::find($id);
        $review->delete();
        //DB::table('messages')->where('id','=',$id)->delete();
        return back()->with('info','Message deleted successfully . ');
    }

    #user reservation start
    public  function reservations(){
        $reservations = Reservation::all()->where('user_id',Auth::id());
        return view('home.user.user_reservations',['reservations'=>$reservations]);
    }
    public function edit_reservation($id){
        $reservation=Reservation::find($id);
        return view('home.user.user_reservations_edit',['reservation'=>$reservation]);

    }

    public function update_reservation(Request $request,$id){
        $reservation=Reservation::find($id);
        $reservation->check_in=$request->input('check_in');
        $reservation->check_out=$request->input('check_out');
        $reservation->adult = $request->input('adult');
        $reservation->child = $request->input('child');
        $reservation->save();

        return redirect(route('user_reservations'))->with('success','reservations updated successfully . ');

    }

    public function delete_reservation($id){
        $data = Reservation::find($id);
        $data->delete();

        return back()->with('info','reservations canceled successfully . ');
    }
    #user reservation end

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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
