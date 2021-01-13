@extends('layouts.admin_base')
@section('title','Admin-Add New Faq')
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
                                <h5>ADD NEW FAQ</h5>
                                <span>add new frequently asked question</span>
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
                                    <a >ADD</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="min-height: 484px;">
                    <div class="card-body">
                        <form class="forms-sample" action="{{route('admin_faq_store')}}" method="post" >
                            @csrf
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Position</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="position" placeholder="position">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Question</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="question" placeholder="question">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Answer</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" name="answer" placeholder="answer" rows="5" ></textarea>
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



                            <button type="submit" class="btn btn-danger mr-2">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection

