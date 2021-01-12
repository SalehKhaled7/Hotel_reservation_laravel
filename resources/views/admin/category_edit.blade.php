@extends('layouts.admin_base')
@section('title','category update')
@section('CSS')
    <link rel="stylesheet" href="{{asset('assets')}}/dashboard/plugins/select2/dist/css/select2.min.css">
@endsection
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-box bg-blue"></i>
                            <div class="d-inline">
                                <h5>updating "{{ $data->title }}" category</h5>
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
                                    <a href="{{route('admin_category')}}">Categories</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin_category_edit',['id'=>$data->id ]) }}">add</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="min-height: 484px;">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('admin_category_update',['id'=>$data->id]) }}" method="post">
                            @csrf
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Parent Category</label>
                                <div class="col-sm-9">

                                        <select class="form-control select2" name="parent_id">
                                            <option value="0"> Main category</option>
                                            @foreach($dataList as $rs)
                                            <option value="{{$rs-> id}}" @if($rs->id == $data->parent_id)  selected="selected" @endif >{{ \App\Http\Controllers\Admin\CategoryController::getParentTree($rs,$rs->title) }}</option>
                                            @endforeach

                                        </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" placeholder="title" value="{{$data->title}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="description" placeholder="description" value="{{$data->description}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Keywords</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="keywords" placeholder="keywords" value="{{$data->keywords}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="slug" placeholder="slug" value="{{$data->slug}}" >
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">

                                    <select class="form-control select2" name="status">
                                        <option value="{{$data->status}}" selected >{{$data->status}}</option>
                                        <option value="true">true</option>
                                        <option value="false">false</option>
                                    </select>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
@section('footerJs')
    <script src="{{asset('assets')}}/dashboard/plugins/select2/dist/js/select2.min.js"></script>
@endsection

