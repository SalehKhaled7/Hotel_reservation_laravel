@extends('home.user._base')
@section('title','MY RESERVATIONS')
@section('path')
    <a href="{{route('user_reservations')}}">RESERVATIONS</a> > <a> EDIT</a>
@endsection
@section('content_user')

    <!-- CONTENT -->
    <div class="col-md-8 col-lg-9" >

        <div class="reservation_content" style="margin-top: 0" >

            <div class="reservation-billing-detail" >

                <h4>RESERVATION EDIT</h4>

                <label>HOTEL :</label>
                <h6>{{$reservation->hotel->title}}</h6>
                <label>ROOM ID :</label>
                <h6>{{$reservation->room_id  }}</h6>
                <label>HOTEL :</label>
                <h6>{{$reservation->hotel->title}}</h6>
                <form action="{{route('user_update_reservation',['id'=>$reservation->id])}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <label>CHECK IN<sup>*</sup></label>
                        <input type="date" class="input-text" id="check_in" name="check_in" value="{{$reservation->check_in}}" onchange="updatedate();">
                    </div>
                    <div class="col-sm-6">
                        <label>CHECK OUT<sup>*</sup></label>
                        <input type="date" class="input-text" id="check_out" name="check_out" min="" value="{{$reservation->check_out}}">
                    </div>
                    <script>
                        function updatedate() {
                            var firstdate = document.getElementById("check_in").value;
                            document.getElementById("check_out").value = "";
                            document.getElementById("check_out").setAttribute("min",firstdate);
                        }
                    </script>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>ADULT NUMBER</label>
                        <select class="awe-select" name="adult">
                            <option @if($reservation->adult == 1) selected @endif value="1">1</option>
                            <option @if($reservation->adult == 2) selected @endif value="2">2</option>
                            <option @if($reservation->adult == 3) selected @endif value="3">3</option>
                            <option @if($reservation->adult == 4) selected @endif value="4">4</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>CHILDREN NUMBER </label>
                        <select class="awe-select" name="child">
                            <option @if($reservation->child == 0) selected @endif value="0" >0</option>
                            <option @if($reservation->child == 1) selected @endif value="1" >1</option>
                            <option @if($reservation->child == 2) selected @endif value="2" >2</option>
                            <option @if($reservation->child == 3) selected @endif value="3" >3</option>
                            <option @if($reservation->child == 4) selected @endif value="4" >4</option>
                        </select>
                    </div>
                </div>



                </ul>
                <button type="submit" class="awe-btn awe-btn-13">UPDATE</button>
                </form>
            </div>

        </div>

    </div>
    <!-- END / CONTENT -->


@endsection
