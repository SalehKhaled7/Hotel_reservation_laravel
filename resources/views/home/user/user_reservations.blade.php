@extends('home.user._base')
@section('title','MY RESERVATIONS')
@section('big_title')
    USER RESERVATIONS
@endsection
@section('path')
    <a style="color: white">MY RESERVATIONS</a>
@endsection
@section('content_user')


    <!-- RATES -->
    <div  >

        <div class="room-detail_rates">
            @include('flash_message')
            <table>
                <thead>
                <tr>
                    <th>Hotel</th>
                    <th>Room id</th>
                    <th>Check in</th>
                    <th>Check out</th>
                    <th>Total Nights</th>
                    <th>Adult</th>
                    <th>child</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach($reservations as $rs)
                    @php
                        $nights = \App\Http\Controllers\HomeController::stay_nights( $rs->check_in,$rs->check_out );
                    @endphp
                    <tr>
                        <td>
                            <h6>{{$rs->hotel->title}}</h6>
                        </td>
                        <td>
                            <p class="price"><span class="amout">{{$rs->room_id}}</span></p>
                        </td>
                        <td>
                            <p class="price"><span class="amout">{{$rs->check_in}}</span></p>
                        </td>
                        <td>
                            <p class="price"><span class="amout">{{$rs->check_out}}</span></p>
                        </td>
                        <td>
                            <p class="price"><span class="amout">{{$nights}}</span></p>
                        </td>
                        <td>
                            <p class="price"><span class="amout">{{$rs->adult}}</span></p>
                        </td>
                        <td>
                            <p class="price"><span class="amout">{{$rs->child}}</span></p>
                        </td>
                        <td>
                            <p class="price"><span class="amout">{{ number_format($nights * $rs->room->price)}}</span></p>
                        </td>
                        <td>
                            <p class="price">
                                <span class="amout">
                                    <a href="{{route('room_detail',['hotel_id'=>$rs->hotel->id,'room_id'=>$rs->room_id])}}"><i class="ik ik-eye"  style="color: #b78c44;font-size: 1.30em"></i></a>
                                    <a href="{{route('user_edit_reservation',['id'=>$rs->id])}}"><i class="ik ik-edit"  style="color: #4f4a3a;font-size: 1.30em"> </i></a>
                                    <a href="{{route('user_delete_reservation',['id'=>$rs->id])}}" onclick="return confirm(' Room with id:{{$rs->room_id}} reservation will be canceled conform !')"> <i class="ik ik-x " style="color: #ec6b1a;font-size: 1.20em"></i></a>
                                </span>
                            </p>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
    <!-- END / RATES -->


@endsection
