@extends('layouts.admin_base')
@section('title','hotel update')
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
                                <h5>Updating "{{ $data->title }}" Hotel</h5>
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
                                    <a href="{{route('hotels')}}">Hotels</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a >Update</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="min-height: 484px;">
                    <div class="card-body">
                        <form class="forms-sample" action="{{ route('admin_hotel_update',['id'=>$data->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">

                                        <select class="form-control select2" name="category_id">
                                            @foreach($dataList as $rs)
                                            <option value="{{$rs-> id}}" @if($rs->id == $data->category_id)  selected="selected" @endif>{{ \App\Http\Controllers\Admin\CategoryController::getParentTree($rs,$rs->title) }}</option>
                                            @endforeach

                                        </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" placeholder="title" value="{{$data->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image"  value="{{$data->image}}">

                                    @if($data->image) <img src="{{asset('assets')}}/images/hotels/{{$data->image}}" alt="image" class="img-fluid img-100"> @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="description" placeholder="description" value="{{$data->description}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Keywords</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="keywords" placeholder="keywords" value="{{$data->keywords}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="slug" placeholder="slug" value="{{$data->slug}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Details</label>
                                <div class="col-sm-9">
                                    <textarea rows="5" class="form-control" name="details" >{{$data->details}}</textarea>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Star</label>
                                <div class="col-sm-9">
                                    <input type="number" min="1" max="5" class="form-control" name="star" placeholder="stars" value="{{$data->star}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" name="phone" placeholder="phone" value="{{$data->phone}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Fax</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fax" placeholder="fax" value="{{$data->fax}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" placeholder="email" value="{{$data->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="city" placeholder="city" value="{{$data->city}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="country" placeholder="country" value="{{$data->country}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" placeholder="address" value="{{$data->address}}">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">

                                    <select class="form-control select2" name="status">
                                        <option value="true" selected >{{$data->status}}</option>
                                        <option value="true">true</option>
                                        <option value="false">false</option>
                                    </select>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <button class="btn btn-light" >Cancel</button>
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

