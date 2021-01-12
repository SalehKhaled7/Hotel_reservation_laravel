@extends('layouts.admin_base')
@section('title','review edit')
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
                        <i class="ik ik-star bg-yellow"></i>
                        <div class="d-inline">
                            <h5>Updating "{{ $review->subject }}" from {{ $review->user->name }} </h5>
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
                                <a href="{{route('reviews')}}">review</a>
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
                    <form class="forms-sample" action="{{ route('admin_review_update',['id'=>$review->id]) }}" method="post" >
                        @csrf
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">id</label>
                            <div class="col-sm-9">
                                <p>{{ $review->id }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">user id</label>
                            <div class="col-sm-9">
                                <p>{{ $review->user_id }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">user ip</label>
                            <div class="col-sm-9">
                                <p>{{ $review->ip }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">hotel id</label>
                            <div class="col-sm-9">
                                <p>{{ $review->hotel_id }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">rate</label>
                            <div class="col-sm-9">
                                <p>{{ $review->rate }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">subject</label>
                            <div class="col-sm-9">
                                <p>{{ $review->subject }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">review</label>
                            <div class="col-sm-9">
                                <p>{{ $review->review }}</p>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">

                                <select class="form-control select2" name="status">
                                    <option value="{{$review->status}}" selected >{{$review->status}}</option>
                                    <option value="true">true</option>
                                    <option value="false">false</option>
                                </select>

                            </div>
                        </div>

                        <button type="submit" class="btn bg-yellow mr-2">save</button>

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

