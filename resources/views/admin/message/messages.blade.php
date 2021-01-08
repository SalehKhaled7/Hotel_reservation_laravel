@extends('layouts.admin_base')
@section('title','Hotels')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <!-- content header start -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-message-square bg-green"></i>
                            <div class="d-inline">
                                <h5>Messages</h5>
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
                                    <a href="{{route('messages')}}">Messages</a>
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
                        <h3>Message list</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    @if($messageList->isNotEmpty())

                        <div class="card-block">

                            <div class="table-responsive">

                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>From</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Messagees</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messageList as $rs)
                                        <tr>
                                            <td>{{$rs-> id}}</td>
                                            <td>{{$rs-> name}}</td>
                                            <td>{{$rs->email}}</td>
                                            <td>{{$rs-> phone}}</td>
                                            <td>{{$rs-> subject}}</td>
                                            <td>{{$rs-> message}}</td>
                                            <td ><span @if($rs-> status == 'new') class="badge-pill bg-red text-white text-capitalize" @endif>{{$rs-> status}}</span >  </td>
                                            <td>{{$rs-> note}}</td>
                                            <td>
                                                <a href="{{ route( 'admin_message_edit',['id'=>$rs->id ] ) }}" ><i class="ik ik-edit f-20 mr-15 text-green"></i></a>
                                                <a href="{{ route( 'admin_message_delete',['id'=>$rs->id ]) }}" onclick="return confirm(' delete message :{{$rs->subject}} from {{$rs->name}}  !')"><i class="ik ik-trash-2 f-20 text-red"></i></a>
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
                                    <h1> No messages</h1>
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

