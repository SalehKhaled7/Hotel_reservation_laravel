@extends('layouts.admin_base')
@section('title','room update')
@section('CSS')
    <link rel="stylesheet" href="{{asset('assets')}}/dashboard/plugins/select2/dist/css/select2.min.css">
@endsection
@section('headerJs')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
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
                                <h5>Updating "{{ $hotel->title }}" room</h5>
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
                                    <a href="{{route('rooms',['hotel_id'=>$hotel->id])}}">{{$hotel->title}}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a >room edit</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="min-height: 484px;">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('admin_room_update',['hotel_id'=>$hotel->id,'id'=>$room->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" placeholder="title" value="{{$room->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="type" placeholder="type" value="{{$room->type}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="description" placeholder="description" value="{{$room->description}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image" value="{{$room->image}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="number"  step="any" class="form-control" name="price" placeholder="price" value="{{$room->price}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Beds</label>
                                <div class="col-sm-9">
                                    <input type="number"  class="form-control" name="beds" placeholder="beds" value="{{$room->beds}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">View</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="view" placeholder="view" value="{{$room->view}}">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">TV</label>
                                <div class="col-sm-9">

                                    <select class="form-control select2" name="tv" >
                                        <option value="yes" selected >{{$room->tv}}</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Wifi</label>
                                <div class="col-sm-9">

                                    <select class="form-control select2" name="wifi">
                                        <option value="yes" selected >{{$room->wifi}}</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Air Conditioner</label>
                                <div class="col-sm-9">

                                    <select class="form-control select2" name="air_conditioner">
                                        <option value="yes" selected >{{$room->air_conditioner}}</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Details</label>
                                <div  class="col-sm-9">
                                    <textarea id="summernote" name="details"></textarea>
                                    <script>
                                        $(document).ready(function() {
                                            $('#summernote').summernote();
                                        });
                                    </script>
                                </div>

                            </div>


                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Available</label>
                                <div class="col-sm-9">

                                    <select class="form-control select2" name="available">
                                        <option value="yes" selected >{{$room->available}}</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <button class="btn btn-light" >Cancel</button>
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

