@extends('layouts.admin_base')
@section('title','settings')
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
                            <i class="ik ik-settings bg-blue"></i>
                            <div class="d-inline">
                                <h5>Settings</h5>
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
                                    <a href="{{route('admin_setting')}}">Settings</a>
                                </li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                        <!-- start  -->
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <form class="forms-sample" action="{{ route('admin_setting_update') }}" method="get" >
                                    @csrf
                                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#general" role="tab" aria-controls="pills-timeline" aria-selected="true">General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="pills-profile" aria-selected="false">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#social" role="tab" aria-controls="pills-setting" aria-selected="false">Social</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-about_us-tab" data-toggle="pill" href="#smtp" role="tab" aria-controls="pills-about_us" aria-selected="false">SMTP</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-about_us-tab" data-toggle="pill" href="#about-us" role="tab" aria-controls="pills-about_us" aria-selected="false">About us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-about_us-tab" data-toggle="pill" href="#contact1" role="tab" aria-controls="pills-about_us" aria-selected="false">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-about_us-tab" data-toggle="pill" href="#references" role="tab" aria-controls="pills-about_us" aria-selected="false">References</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-faq-tab" data-toggle="pill" href="#faq" role="tab" aria-controls="pills-faq" aria-selected="false">FAQ</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Setting ID</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="id" placeholder="id" value="{{$data->id}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="title" placeholder="title" value="{{$data->title}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Keywords</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="keywords" placeholder="keywords" value="{{$data->keywords}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="description" placeholder="description" value="{{$data->description}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Company</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="company" placeholder="description" value="{{$data->company}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">

                                                    <select class="form-control select2" name="status">
                                                        <option value="{{$data->status}}" selected>{{$data->status}}</option>
                                                        <option value="true">true</option>
                                                        <option value="false">false</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="address" placeholder="address" value="{{$data->address}}">
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
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="pills-setting-tab">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Facebook</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="facebook" placeholder="facebook" value="{{$data->facebook}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Instagram</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="instagram" placeholder="instagram" value="{{$data->instagram}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Twitter</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="twitter" placeholder="twitter" value="{{$data->twitter}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Linkedin</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="linkedin" placeholder="linkedin" value="{{$data->linkedin}}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="smtp" role="tabpanel" aria-labelledby="pills-about_us-tab">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">SMTP Server</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="smtp_server" placeholder="smtp server" value="{{$data->smtp_server}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">SMTP Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="smtp_email" placeholder="smtp email" value="{{$data->smtp_email}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">SMTP Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="smtp_password" placeholder="smtp password" value="{{$data->smtp_password}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">SMTP Port</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="smtp_port" placeholder="smtp port" value="{{$data->smtp_port}}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="about-us" role="tabpanel" aria-labelledby="pills-about_us-tab">
                                        <div class="card-body">


                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">About us</label>
                                                <div  class="col-sm-9">
                                                    <textarea id="about_us" name="about_us">{{$data->about_us}}</textarea>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#about_us').summernote();
                                                        });
                                                    </script>

                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="pills-about_us-tab">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">Contact</label>
                                                <div  class="col-sm-9">
                                                    <textarea id="contact2" name="contact">{{$data->contact}}</textarea>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#contact2').summernote();
                                                        });
                                                    </script>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="references" role="tabpanel" aria-labelledby="pills-about_us-tab">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">References</label>
                                                <div  class="col-sm-9">
                                                    <textarea id="references2" name="references">{{$data->references}}</textarea>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#references2').summernote();
                                                        });
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="pills-faq-tab">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label  class="col-sm-3 col-form-label">FAQ</label>
                                                <div  class="col-sm-9">
                                                    <textarea id="faq2" name="faq">{{$data->faq}}</textarea>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#faq2').summernote();
                                                        });
                                                    </script>

                                                </div>
                                            </div>
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

