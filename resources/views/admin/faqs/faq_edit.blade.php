@extends('layouts.admin_base')
@section('title','Admin-FAQ Edit')
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
                            <i class="ik ik-help-circle bg-red"></i>
                            <div class="d-inline">
                                <h5>Edit frequently asked question</h5>
                                <span>Editing {{$faq->question}}</span>
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
                                    <a href="{{route('admin_faqs')}}">FAQS</a>
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
                        <form class="forms-sample" action="{{route('admin_faq_update',['id'=>$faq->id])}}" method="post" >
                            @csrf
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Id</label>
                                <div class="col-sm-9">
                                    <p>{{$faq->id}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Position</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="position" placeholder="position" value="{{$faq->position}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Question</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="question" placeholder="question" value="{{$faq->question}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Answer</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" name="answer" placeholder="answer" rows="5" >{{$faq->answer}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">

                                    <select class="form-control select2" name="status">
                                        <option @if($faq->satuts == 'true') selected  @endif value="true">true</option>
                                        <option @if($faq->status == 'false') selected @endif value="false">false</option>
                                    </select>

                                </div>
                            </div>



                            <button type="submit" class="btn btn-danger mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection

