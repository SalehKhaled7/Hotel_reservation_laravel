@extends('layouts.admin_base')
@section('title','add new image')
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
                                <h5>{{$hotel->title}} Hotel - {{$room->title}}</h5>
                                <span>Add images</span>
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
                                    <a >{{$room->title}}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a >gallery</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="min-height: 250px;">
                    <div class="card-body">
                        <div class="col-md-12">
                            <br>
                            <br>
                            <br>
                        </div>
                        <form class="forms-sample" action="{{route('admin_image_store',['room_id'=>$room->id,'hotel_id'=>$hotel->id])}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" placeholder="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add</button>
                        </form>

                    </div>


                            @if($imageList->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Images</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($imageList as $rs)
                                        <tr>
                                            <td>{{$rs-> id}}</td>
                                            <td>{{$rs-> title}}</td>
                                            <td> @if($rs->image) <img src="{{asset('assets')}}/images/hotels/{{$hotel->title}}/{{$room->title}}/{{$rs->image}}" alt="image" height="100px"> @endif </td>
                                            <td>
                                                <a href="{{ route( 'admin_image_delete',['id'=>$rs->id,'hotel_id'=>$hotel->id ,'room_id'=>$room->id  ] ) }}" onclick="return confirm('{{$rs->title}} image will be deleted permanently continue !')"><i class="ik ik-trash-2 f-20 text-red"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <h1> No image added yet</h1>
                                        </div>

                                    </div>
                                </div>
                            @endif


                </div>
            </div>

        </div>

    </div>



@endsection
@section('footerJs')
    <script src="{{asset('assets')}}/dashboard/plugins/select2/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection

