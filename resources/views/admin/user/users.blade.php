@extends('layouts.admin_base')
@section('title','Users')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <!-- content header start -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-user bg-dark"></i>
                            <div class="d-inline">
                                <h5>Users</h5>
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
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- content header end -->

            <!-- category list start -->
            <div class="col-md-12">
                @include('flash_message')
                <div class="card table-card">
                    <div class="card-header">
                        <h3>User list</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    @if($user_list->isNotEmpty())

                        <div class="card-block">

                            <div class="table-responsive">

                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_list as $rs)
                                        <tr>
                                            <td>{{$rs-> id}}</td>
                                            <td>@if ($rs->profile_photo_path) <img src="{{\Illuminate\Support\Facades\Storage::url($rs->profile_photo_path)}}" height="100px">@endif</td>

                                            <td>{{$rs-> name}}</td>
                                            <td>{{$rs-> email}}</td>
                                            <td>{{$rs->phone}}</td>
                                            <td>@foreach($rs->roles as $role)
                                                    {{$role-> name}} ,
                                                @endforeach
                                                <a href="{{ route( 'admin_user_roles',['id'=>$rs->id ] ) }}" onclick="return !window.open(this.href, '','top=50 left=100 width=800 height=900')" ><i class="ik ik-plus f-20 mr-15 text-green"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route( 'admin_user_edit',['id'=>$rs->id ] ) }}" ><i class="ik ik-edit f-20 mr-15 text-blue"></i></a>
                                                <a href="{{ route( 'admin_user_delete',['id'=>$rs->id ]) }}" onclick="return confirm(' delete user: {{$rs->name}}  !')"><i class="ik ik-trash-2 f-20 text-red"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    @else
                        <div class="card-block">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h1> No reviews</h1>
                                </div>

                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- category list end -->
        </div>
    </div>

@endsection
@section('footerJs')

@endsection

