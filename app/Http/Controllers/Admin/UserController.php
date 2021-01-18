<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_list = User::all();
        return view('admin.user.users',['user_list'=>$user_list]);
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
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(user $user,$id)
    {
        $user =User::find($id);
        return view('admin.user.user_edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, user $user,$id)
    {
        $data=User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        if ($request->file('image')!=null){
            $data->profile_photo_path=Storage::putFile('public/images/profile-photos',$request->file('image'));
        }
        $data->save();
        return redirect(route('admin_users'))->with('success','user updated successfully . ');
    }

    public function user_roles($id){
        $user = User::find($id);
        $roles = Role::all()->sortBy('name');
        $data=[
            'user'=>$user,
            'roles'=>$roles
        ];
        //dd($data);
        return view('admin.user.user_roles',$data);
    }
    public function User_role_store(Request $request,$id){
        $user=User::find($id);
        $role_id=$request->input('role_id');
        $user->roles()->attach($role_id);
        return back()->with('success','role added successfully !');

    }

    public function User_role_delete(Request $request,$user_id,$role_id){
        $user=User::find($user_id);
        $user->roles()->detach($role_id);
        return back()->with('success','role deleted successfully !');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
