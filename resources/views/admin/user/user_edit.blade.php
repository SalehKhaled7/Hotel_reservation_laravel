@extends('layouts.admin_base')
@section('title','User Edit')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-user bg-dark"></i>
                            <div class="d-inline">
                                <h5>Updating "{{ $user->name }}" Info</h5>
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
                                    <a >EDIT</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="min-height: 484px;">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('admin_user_update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Id</label>
                                <div class="col-sm-9">
                                   <p>{{$user->id}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="name" required value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" placeholder="email" required value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="phone" placeholder="phone" required value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image" value="{{$user->image}}">
                                    @if($user->profile_photo_path) <img src="{{\Illuminate\Support\Facades\Storage::url($user->profile_photo_path)}}" alt="image" height="100px" class="img-fluid"> @endif

                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark mr-2">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
@section('footerJs')
    <script src="{{asset('assets')}}/dashboard/plugins/select2/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection

