@extends('layouts.admin_base')
@section('title','Hotels')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <!-- content header start -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-4">
                        <div class="page-header-title">
                            <i class="ik ik-box bg-blue"></i>
                            <div class="d-inline">
                                <h5>Hotels</h5>
                                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" >
                        <div class="d-inline">
                       <a href="{{route('admin_hotel_add')}}"><button  type="button" class="btn btn-warning">add new</button></a>
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
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- content header end -->

            <!-- category list start -->
            <div class="col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h3>Hotel list</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Star</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Rooms</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataList as $rs)
                                <tr>
                                    <td>{{$rs-> id}}</td>
                                    <td>{{$rs->category->title}}</td>
                                    <td>{{$rs-> title}}</td>
                                    <td>{{$rs-> star}}</td>
                                    <td>@if($rs->image) <img src="{{asset('assets')}}/images/hotels/{{$rs->image}}" alt="image" height="50px"> @endif</td>
                                    <td>@if($rs -> status == 'true')
                                        <div class="p-status bg-green"></div>
                                        @else
                                            <div class="p-status bg-red"></div>
                                        @endif
                                    </td>
                                    <td><a href="{{ route( 'rooms',['hotel_id'=>$rs->id] ) }}"><i class="ik ik-book-open f-20 mr-15 text-blue"></i></a></td>
                                    <td>

                                        <a href="{{ route( 'admin_hotel_edit',['id'=>$rs->id] ) }}"><i class="ik ik-edit f-20 mr-15 text-green"></i></a>
                                        <a href="{{ route( 'admin_hotel_delete',['id'=>$rs->id] ) }}" onclick="return confirm('{{$rs->title}} hotel will be deleted permanently continue !')"><i class="ik ik-trash-2 f-20 text-red"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- category list end -->
        </div>
    </div>

@endsection
@section('footerJs')

@endsection
