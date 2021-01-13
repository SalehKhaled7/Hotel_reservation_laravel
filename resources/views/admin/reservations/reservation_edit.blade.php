@extends('layouts.admin_base')
@section('title','reservation edit')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-book bg-dark"></i>
                            <div class="d-inline">
                                <h5>Updating {{ $reservation->user->name }}'s reservation id:{{$reservation->id}}</h5>
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
                                    <a href="{{route('admin_reservations')}}">reservation</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a >Edit</a>
                                </li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="min-height: 484px;">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('admin_reservation_update',['id'=>$reservation->id]) }}" method="post" >
                            @csrf
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label"> Reservation id</label>
                                <div class="col-sm-9">
                                    <p>{{ $reservation->id }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">User id</label>
                                <div class="col-sm-9">
                                    <p>{{ $reservation->user_id }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Hotel id</label>
                                <div class="col-sm-9">
                                    <p>{{ $reservation->hotel_id }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Room id</label>
                                <div class="col-sm-9">
                                    <p>{{ $reservation->room_id }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Check In</label>
                                <div class="col-sm-9">
                                    <p>{{ $reservation->check_in }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Check Out</label>
                                <div class="col-sm-9">
                                    <p>{{ $reservation->check_in }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Adult Number</label>
                                <div class="col-sm-9">
                                    <p>{{ $reservation->adult }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Children Number</label>
                                <div class="col-sm-9">
                                    <p>{{ $reservation->child }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Created At</label>
                                <div class="col-sm-9">
                                    <p>{{ $reservation->created_at }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Updated At</label>
                                <div class="col-sm-9">
                                    <p>{{ $reservation->updated_at }}</p>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">

                                    <select class="form-control select2" name="status">
                                        <option value="{{$reservation->status}}" selected >{{$reservation->status}}</option>
                                        <option value="true">true</option>
                                        <option value="false">false</option>
                                    </select>

                                </div>
                            </div>

                            <button type="submit" class="btn bg-dark mr-2 text-white" >save</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection

