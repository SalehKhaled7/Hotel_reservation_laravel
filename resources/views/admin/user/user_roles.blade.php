@extends('layouts.admin_base')
@section('title','User Roles')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-user bg-dark"></i>
                            <div class="d-inline">
                                <h5>Updating "{{ $user->name }}" Roles</h5>
                                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin')}}"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin_users')}}">USERS</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a>{{$user->name}}</a>
                                </li>

                                <li class="breadcrumb-item">
                                    <a>ROLES</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @include('flash_message')
                <div class="card" style="min-height: 484px;">
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                @if($user->profile_photo_path) <img
                                    src="{{\Illuminate\Support\Facades\Storage::url($user->profile_photo_path)}}"
                                    alt="image" height="100px" class="img-fluid"> @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Id</label>
                            <div class="col-sm-9">
                                <p>{{$user->id}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <p>{{$user->name}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <p>{{$user->email}}</p>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <p>{{$user->phone}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Roles</label>
                            <div class="col-sm-9">

                                <ul style="list-style-type: none">
                                    <div class="row">@foreach($user->roles as $role)

                                            <li>
                                                <span style="font-size: 15px;color: green">{{$role -> name }}</span><a
                                                    href="{{ route( 'admin_user_role_delete',['user_id'=>$user->id,'role_id'=>$role->id ] ) }}"
                                                    onclick="return confirm(' delete role: {{$role->name}}  !')"><i
                                                        class="ik ik-trash f-20 mr-15 text-red"></i></a>
                                            </li>
                                        @endforeach</div>
                                </ul>

                            </div>
                        </div>
                        <form class="forms-sample" action="{{ route('admin_user_role_add',['id'=>$user->id]) }}"
                              method="post">
                            @csrf
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">

                                    <select class="form-control select2" name="role_id">
                                        @foreach($roles as $rs)
                                            <option value="{{$rs->id}}">{{$rs->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark mr-2">ADD ROLE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection


