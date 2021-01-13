@extends('layouts.admin_base')
@section('title',$setting->title.'-FAQS')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <!-- content header start -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-4">
                        <div class="page-header-title">
                            <i class="ik ik-help-circle bg-red"></i>
                            <div class="d-inline">
                                <h5>{{$setting->title}} FREQUENTLY ASKED QUESTIONS</h5>
                                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" >
                        <div class="d-inline">
                            <a href="{{route('admin_faq_create')}}"><button  type="button" class="btn btn-danger">ADD NEW</button></a>
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
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- content header end -->

            <!-- category list start -->
            <div class="col-md-12">
                @include('flash_message')
                <div class="card table-card">
                    <div class="card-header">
                        <h3>FAQ List</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    @if($faqList->isNotEmpty())
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Position</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th >Created at</th>
                                        <th >Updated at</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($faqList as $rs)
                                        <tr>
                                            <td>{{$rs-> id}}</td>
                                            <td>{{$rs-> position}}</td>
                                            <td>{{$rs-> question}}</td>

                                            <td>{{$rs->answer}}</td>

                                            <td>{{$rs-> created_at}}</td>
                                            <td>{{$rs-> updated_at}}</td>
                                            <td>@if($rs -> status == 'true')
                                                    <div class="p-status bg-green"></div>
                                                @else
                                                    <div class="p-status bg-red"></div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route( 'admin_faq_edit',['id'=>$rs->id ] ) }}"><i class="ik ik-edit f-20 mr-15 text-green"></i></a>
                                                <a href="{{ route( 'admin_faq_delete',['id'=>$rs->id] ) }}" onclick="return confirm('{{$rs->question}} question will be deleted permanently continue !')"><i class="ik ik-trash-2 f-20 text-red"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    @else
                        <div class="card-block">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h1> No question added yet</h1>
                                </div>

                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- category list end -->
        </div>
    </div>

@endsection
@section('footerJs')

@endsection

