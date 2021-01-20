
@extends('layouts.base')
@section('title',$hotel->title.'-'.$room->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('CSS')
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/hotel_picker/css/hotel-datepicker.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/hotel_picker/css/main.css">
@endsection
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner" style="background-image:url('{{asset('assets')}}/images/hotels/{{$hotel->image}}')">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{{$hotel->title}} Rooms</h2>
                    <span style="color: white"><a style="color: white" href="{{route('home')}}">{{$setting->title}}</a>  >  <a style="color: white" href="{{route('room_list',['id'=>$hotel->id])}}">{{$hotel->title}}</a>  >  <a style="color: white">{{$room->title}}</a></span>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- ROOM DETAIL -->
    <section class="section-room-detail bg-white">
        <div class="container">

            <!-- DETAIL -->
            <div class="room-detail">
                <div class="row">
                    <div class="col-lg-9">

                        <!-- LAGER IMGAE -->
                        <div class="room-detail_img">


                            @if(count($image_list)>0)
                            @foreach($image_list as $rs)
                            <div class="room_img-item">
                                <img src="{{asset('assets')}}/images/hotels/{{$hotel->title}}/{{$room->title}}/{{$rs->image}}" alt="">

                            </div>
                            @endforeach
                            @else
                                <div class="room_img-item">
                                    <img src="{{asset('assets')}}/images/rooms/{{$room->image}}" alt="">

                                </div>
                            @endif


                        </div>
                        <!-- END / LAGER IMGAE -->

                        <!-- THUMBNAIL IMAGE -->
                        <div class="room-detail_thumbs">
                            @if(count($image_list)>0)
                            @foreach($image_list as $rs)
                            <a href="#"><img src="{{asset('assets')}}/images/hotels/{{$hotel->title}}/{{$room->title}}/{{$rs->image}}" alt=""></a>
                            @endforeach
                            @else
                                    <a href="#"><img src="{{asset('assets')}}/images/rooms/{{$room->image}}" alt=""></a>
                            @endif

                        </div>
                        <!-- END / THUMBNAIL IMAGE -->

                    </div>

                    <div class="col-lg-3">

                        <!-- FORM BOOK -->
                        <div class="room-detail_book">
                            @include('flash_message')

                            <div class="room-detail_total">
                                <img src="images/icon-logo.png" alt="" class="icon-logo">

                                <h6>STARTING ROOM FROM</h6>

                                <p class="price">
                                    <span class="amout">${{$room->price}}</span>  /days
                                </p>
                            </div>

                            <div class="room-detail_form">
                                <form action="{{route('add_reservation',['hotel_id'=>$hotel->id,'room_id'=>$room->id])}}" method="post">
                                @csrf
                                    <h1 id="nights"></h1>
                                <label>Check in - Check out</label>

                                <div class="demo__input">
                                    <input type="text" id="demo3"  value="" name="check_in_out" placeholder="check in - check out"
                                           style="background-color: #fff;
                                    border-width: 0;
                                    height: 30px;
                                    line-height: 30px;
                                    width: 210px;
                                    color: #898989;
                                    font-weight: 500;">
                                </div>


                                <label>Adult</label>
                                <select class="awe-select" name="adult">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                <label>Chirld</label>
                                <select class="awe-select" name="child">
                                    <option value="0" selected>0</option>
                                    <option value="1" >1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                    @auth
                                <button type="submit" class="awe-btn awe-btn-13">Book Now</button>
                                    @else
                                       <a href="{{route('user_login')}}"><h3>login to account</h3> </a>
                                    @endauth
                                </form>
                            </div>

                        </div>
                        <!-- END / FORM BOOK -->

                    </div>
                </div>
            </div>
            <!-- END / DETAIL -->

            <!-- TAB -->
            <div class="room-detail_tab">

                <div class="row">
                    <div class="col-md-3">
                        <ul class="room-detail_tab-header">
                            <li class="active"><a href="#overview" data-toggle="tab">OVERVIEW</a></li>
                            <li><a href="#amenities" data-toggle="tab">amenities</a></li>
                            <li><a href="#package" data-toggle="tab">PACKAGE</a></li>
                            <li><a href="#calendar" data-toggle="tab">Calendar</a></li>
                        </ul>
                    </div>

                    <div class="col-md-9">
                        <div class="room-detail_tab-content tab-content">

                            <!-- OVERVIEW -->
                            <div class="tab-pane fade active in" id="overview">

                                <div class="room-detail_overview">
                                    <h5 class='text-uppercase'>de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h5>
                                    <p>Located in the heart of Aspen with a unique blend of contemporary luxury and historic heritage, deluxe accommodations, superb amenities, genuine hospitality and dedicated service for an elevated experience in the Rocky Mountains.</p>

                                    <div class="row">
                                        <div class="col-xs-6 col-md-4">
                                            <h6>SPECIAL ROOM</h6>
                                            <ul>
                                                <li>Id: {{$room->id}}  </li>
                                                <li>Type: {{$room->type}}</li>
                                                <li>Max: {{$room->beds}} Person(s)</li>
                                                <li>View: {{$room->view}}</li>

                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <h6>SERVICE ROOM</h6>
                                            <ul>
                                                <li>Oversized work desk</li>
                                                <li>Hairdryer</li>
                                                <li>Iron/ironing board upon request</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- END / OVERVIEW -->

                            <!-- AMENITIES -->
                            <div class="tab-pane fade" id="amenities">

                                <div class="room-detail_amenities">
                                    <p>Located in the heart of Aspen with a unique blend of contemporary luxury and historic heritage, deluxe accommodations, superb amenities, genuine hospitality and dedicated service for an elevated experience in the Rocky Mountains.</p>

                                    <div class="row">
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>LIVING ROOM</h6>
                                            <ul>
                                                <li>TV: @if($room ->tv) Yes @else No @endif</li>
                                                <li>WIFI: @if($room ->wifi) Yes @else No @endif</li>
                                                <li>Air conditioner:  @if($room ->air_conditioner) Yes @else No @endif </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>KITCHEN ROOM</h6>
                                            <ul>
                                                <li>AM/FM clock radio</li>
                                                <li>Voicemail</li>
                                                <li>High-speed Internet access</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>balcony</h6>
                                            <ul>
                                                <li>AM/FM clock radio</li>
                                                <li>Voicemail</li>
                                                <li>High-speed Internet access</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>bedroom</h6>
                                            <ul>
                                                <li>Coffee maker</li>
                                                <li>25 inch or larger TV</li>
                                                <li>Cable/satellite TV channels</li>
                                                <li>AM/FM clock radio</li>
                                                <li>Voicemail</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>bathroom</h6>
                                            <ul>
                                                <li>Dataport</li>
                                                <li>Phone access fees waived</li>
                                                <li>24-hour Concierge service</li>
                                                <li>Private concierge</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-4">
                                            <h6>Oversized work desk</h6>
                                            <ul>
                                                <li>Dataport</li>
                                                <li>Phone access fees waived</li>
                                                <li>24-hour Concierge service</li>
                                                <li>Private concierge</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- END / AMENITIES -->

                            <!-- PACKAGE -->
                            <div class="tab-pane fade" id="package">

                                <div class="room-detail_package">

                                    <!-- ITEM package -->
                                    <div class="room-package_item">

                                        <div class="text">
                                            <h4><a href="#">Comming soon</a></h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>

                                            <div class="room-package_price">
                                                <p class="price">
                                                    <span class="amout">$xxx</span> / Package
                                                </p>
                                                <a href="#" class="awe-btn awe-btn-default">Book package</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END / ITEM package -->


                                </div>

                            </div>
                            <!-- END / PACKAGE -->

                            <!-- CALENDAR -->
                            <div class="tab-pane fade" id="calendar">

                                <div class="room-detail_calendar-wrap row">

                                    <div class="col-sm-6">
                                        <!-- CALENDAR ITEM -->
                                        <div class="calendar_custom">

                                            <div class="calendar_title">
                                                <span class="calendar_month">JUNE</span>
                                                <span class="calendar_year">2015</span>

                                                <a href="#" class="calendar_prev calendar_corner"><i class="lotus-icon-left-arrow"></i></a>
                                            </div>

                                            <table class="calendar_tabel">

                                                <thead>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                                </thead>

                                                <tr>
                                                    <td></td>
                                                    <td class="apb-calendar_current-date">
                                                        <a href="#"><small>1</small></a>
                                                    </td>
                                                    <td><a href="#"><small>2</small></a></td>
                                                    <td><a href="#"><small>3</small></a></td>
                                                    <td><a href="#"><small>4</small></a></td>
                                                    <td><a href="#"><small>5</small></a></td>
                                                    <td><a href="#"><small>6</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>7</small></a></td>
                                                    <td><a href="#"><small>8</small></a></td>
                                                    <td><a href="#"><small>9</small></a></td>
                                                    <td><a href="#"><small>10</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>11</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>12</small></a></td>
                                                    <td><a href="#"><small>13</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>14</small></a></td>
                                                    <td><a href="#"><small>15</small></a></td>
                                                    <td class="not-available"><a href="#"><small>16</small></a></td>
                                                    <td class="not-available"><a href="#"><small>17</small></a></td>
                                                    <td><a href="#"><small>18</small></a></td>
                                                    <td><a href="#"><small>19</small></a></td>
                                                    <td><a href="#"><small>20</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>21</small></a></td>
                                                    <td><a href="#"><small>22</small></a></td>
                                                    <td><a href="#"><small>23</small></a></td>
                                                    <td><a href="#"><small>24</small></a></td>
                                                    <td><a href="#"><small>25</small></a></td>
                                                    <td><a href="#"><small>26</small></a></td>
                                                    <td><a href="#"><small>27</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>28</small></a></td>
                                                    <td><a href="#"><small>29</small></a></td>
                                                    <td><a href="#"><small>30</small></a></td>
                                                    <td><a href="#"><small>31</small></a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </table>

                                        </div>
                                        <!-- END CALENDAR ITEM -->
                                    </div>

                                    <div class="col-sm-6">

                                        <!-- CALENDAR ITEM -->
                                        <div class="calendar_custom">

                                            <div class="calendar_title">
                                                <span class="calendar_month">JUNE</span>
                                                <span class="calendar_year">2015</span>

                                                <a href="#" class="calendar_next calendar_corner"><i class="lotus-icon-right-arrow"></i></a>
                                            </div>

                                            <table class="calendar_tabel">

                                                <thead>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                                </thead>

                                                <tr>
                                                    <td></td>
                                                    <td class="apb-calendar_current-date">
                                                        <a href="#"><small>1</small></a>
                                                    </td>
                                                    <td><a href="#"><small>2</small></a></td>
                                                    <td><a href="#"><small>3</small></a></td>
                                                    <td><a href="#"><small>4</small></a></td>
                                                    <td><a href="#"><small>5</small></a></td>
                                                    <td><a href="#"><small>6</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>7</small></a></td>
                                                    <td><a href="#"><small>8</small></a></td>
                                                    <td><a href="#"><small>9</small></a></td>
                                                    <td><a href="#"><small>10</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>11</small></a></td>
                                                    <td class="apb-calendar_current-select"><a href="#"><small>12</small></a></td>
                                                    <td><a href="#"><small>13</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>14</small></a></td>
                                                    <td><a href="#"><small>15</small></a></td>
                                                    <td class="not-available"><a href="#"><small>16</small></a></td>
                                                    <td class="not-available"><a href="#"><small>17</small></a></td>
                                                    <td><a href="#"><small>18</small></a></td>
                                                    <td><a href="#"><small>19</small></a></td>
                                                    <td><a href="#"><small>20</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>21</small></a></td>
                                                    <td><a href="#"><small>22</small></a></td>
                                                    <td><a href="#"><small>23</small></a></td>
                                                    <td><a href="#"><small>24</small></a></td>
                                                    <td><a href="#"><small>25</small></a></td>
                                                    <td><a href="#"><small>26</small></a></td>
                                                    <td><a href="#"><small>27</small></a></td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><small>28</small></a></td>
                                                    <td><a href="#"><small>29</small></a></td>
                                                    <td><a href="#"><small>30</small></a></td>
                                                    <td><a href="#"><small>31</small></a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </table>

                                        </div>
                                        <!-- END CALENDAR ITEM -->
                                    </div>

                                    <div class="calendar_status text-center col-sm-12">
                                        <span>Available</span>
                                        <span class="not-available">Not Available</span>
                                    </div>
                                </div>

                            </div>
                            <!-- END / CALENDAR -->

                        </div>
                    </div>

                </div>

            </div>
            <!-- END / TAB -->

        </div>
    </section>
    <!-- END / SHOP DETAIL -->

@endsection
@section('footerJs')
    <script type="text/javascript" src="{{asset('assets')}}/hotel_picker/js/fecha.min.js"></script>
    <script type="text/javascript" src="{{asset('assets')}}/hotel_picker/js/hotel-datepicker.min.js"></script>

    <script type="text/javascript">
        (function() {
            // ------------------- DEMO 1 ------------------- //


            var taken_days = {!! json_encode($arr) !!};
            var demo3 = new HotelDatepicker(document.getElementById('demo3'), {
                format: 'DD-MM-YYYY',
                disabledDates: taken_days
            });







        })();
    </script>
@endsection
