@extends('layouts.admin_base')
@section('title','message edit')
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
                        <i class="ik ik-message-square bg-green"></i>
                        <div class="d-inline">
                            <h5>Updating "{{ $message->subject }}" from {{ $message->name }} </h5>
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
                                <a href="{{route('hotels')}}">Messages</a>
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
                    <form class="forms-sample" action="{{ route('admin_message_update',['id'=>$message->id]) }}" method="post" >
                        @csrf
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">name</label>
                            <div class="col-sm-9">
                                <p>{{ $message->name }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">email</label>
                            <div class="col-sm-9">
                                <p>{{ $message->email }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">phone</label>
                            <div class="col-sm-9">
                                <p>{{ $message->phone }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">subject</label>
                            <div class="col-sm-9">
                                <p>{{ $message->subject }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">message</label>
                            <div class="col-sm-9">
                                <p>{{ $message->message }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">client IP</label>
                            <div class="col-sm-9">
                                <p>{{ $message->ip }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Note</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="note" placeholder="note"  value="{{$message->note}}">
                            </div>
                        </div>

                        <button type="submit" class="btn bg-green mr-2">save</button>

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

