@extends('layouts.admin_base')
@section('title','add new hotel')
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
                                <h5>Add new hotel</h5>
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
                                    <a href="{{route('hotels')}}">Hotels</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin_hotel_add')}}">add</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="min-height: 484px;">
                    <div class="card-body">
                        <form class="forms-sample" action="{{route('admin_hotel_store')}}" method="post">
                            @csrf
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">

                                        <select class="form-control select2" name="category_id">
                                            @foreach($dataList as $rs)
                                            <option value="{{$rs-> id}}">{{$rs-> title}}</option>
                                            @endforeach

                                        </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" placeholder="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="description" placeholder="description">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Keywords</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="keywords" placeholder="keywords">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="slug" placeholder="slug">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Details</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="details" placeholder="details" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Star</label>
                                <div class="col-sm-9">
                                    <input type="number" min="1" max="5" class="form-control" name="star" placeholder="stars" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" name="phone" placeholder="phone" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Fax</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fax" placeholder="fax" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" placeholder="email" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="city" placeholder="city" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="country" placeholder="country" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" placeholder="address" >
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">

                                    <select class="form-control select2" name="status">
                                        <option value="true">true</option>
                                        <option value="false">false</option>
                                    </select>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Add</button>
                            <button class="btn btn-light" href="{{route('hotels')}}">Cancel</button>
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

