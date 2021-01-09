@extends('layouts.admin_base')
@section('title','Front settings')
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
                            <i class="ik ik-monitor bg-blue"></i>
                            <div class="d-inline">
                                <h5>Front Settings</h5>
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
                                    <a href="{{route('admin_front_setting')}}">Front Settings</a>
                                </li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                        <!-- start  -->
                        <div class="col-lg-12 col-md-12">
                            @include('flash_message')
                            <div class="card">
                                <form class="forms-sample" action="{{ route('admin_front_setting_update',['id'=>$data->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#index" role="tab" aria-controls="pills-timeline" aria-selected="true">index</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#other" role="tab" aria-controls="pills-profile" aria-selected="false">other</a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="index" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Slider image 1 1920x980</label>
                                                <div class="col-sm-2">
                                                    @if($data->slider_img1) <img src="{{\Illuminate\Support\Facades\Storage::url($data->slider_img1)}}" alt="slider_img1" class="img-fluid img-200"> @endif
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="file"  name="slider_img1" value="{{$data->slider_img1}}"  >

                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Slider image 2 1920x980</label>
                                                <div class="col-sm-2">
                                                    @if($data->slider_img2) <img src="{{\Illuminate\Support\Facades\Storage::url($data->slider_img2)}}" alt="slider_img2" class="img-fluid img-200"> @endif
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="file"  name="slider_img2" value="{{$data->slider_img2}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">index hotel section bg 1920x800</label>
                                                <div class="col-sm-2">
                                                    @if($data->index_hotel_bg) <img src="{{\Illuminate\Support\Facades\Storage::url($data->index_hotel_bg)}}" alt="index_hotel_bg" class="img-fluid img-200"> @endif
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="file"  name="index_hotel_bg" value="{{$data->index_hotel_bg}}">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">index about us section</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="index_about_us" placeholder="index about us" value="{{$data->index_about_us}}">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">index about us image  570x300</label>
                                                <div class="col-sm-2">
                                                    @if($data->index_about_us_img) <img src="{{\Illuminate\Support\Facades\Storage::url($data->index_about_us_img)}}" alt="index_about_us_img" class="img-fluid img-200"> @endif
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="file"  name="index_about_us_img" value="{{$data->index_about_us_img}}">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">index review section bg  1920x420</label>
                                                <div class="col-sm-2">
                                                    @if($data->index_review_bg) <img src="{{\Illuminate\Support\Facades\Storage::url($data->index_review_bg)}}" alt="index_review_bg" class="img-fluid img-200"> @endif
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="file"  name="index_review_bg" value="{{$data->index_review_bg}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="card-body">

                                        </div>
                                    </div>


                                </div>
                                    <div class="card-body">
                                    <button type="submit" class="btn btn-success bg-blue">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end  -->
            </div>
        </div>

    </div>


@endsection
@section('footerJs')
    <script src="{{asset('assets')}}/dashboard/plugins/select2/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection

