@extends('home.user._base')
@section('title','MY RESERVATIONS')
@section('path')
    <a>MY RESERVATIONS</a>
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
                    <th>Adult</th>
                    <th>child</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach($reservations as $rs)
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
                            <p class="price"><span class="amout">{{$rs->adult}}</span></p>
                        </td>
                        <td>
                            <p class="price"><span class="amout">{{$rs->child}}</span></p>
                        </td>
                        <td>
                            <p class="price">
                                <span class="amout">
                                    <a href="{{route('room_detail',['hotel_id'=>$rs->hotel->id,'room_id'=>$rs->room_id])}}"><i class="ik ik-eye f-20 mr-10 text-blue"></i></a>
                                    <a href="{{route('user_edit_reservation',['id'=>$rs->id])}}"><i class="ik ik-edit f-20 mr-10 text-green"> </i></a>
                                    <a href="{{route('user_delete_reservation',['id'=>$rs->id])}}" onclick="return confirm(' Room with id:{{$rs->room_id}} reservation will be canceled conform !')"> <i class="ik ik-x f-20 mr-10 text-red"></i></a>
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
