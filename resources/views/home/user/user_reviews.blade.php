@extends('home.user._base')
@section('title_user','REVIEWS')
@section('path')
    <a>MY REVIEWS</a>
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
                    <th>Subject</th>
                    <th>review</th>
                    <th>Review date</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach($reviews as $rs)
                <tr>
                    <td>
                        <h6>{{$rs->hotel->title}}</h6>
                    </td>
                    <td>
                        <p class="price"><span class="amout">{{$rs->subject}}</span></p>
                    </td>
                    <td>
                        <p class="price"><span class="amout">{{$rs->review}}</span></p>
                    </td>
                    <td>
                        <p class="price"><span class="amout">{{$rs->created_at}}</span></p>
                    </td>
                    <td>
                        <p class="price"><span class="amout"><a href="{{route('user_delete_review',['id'=>$rs->id])}}"> delete </a></span></p>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
    <!-- END / RATES -->


@endsection
