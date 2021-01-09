<!-- call sub-category recursively -->
@foreach($child as $subCategory)
    <ul class="sub-menu">
        @if(count($subCategory->child))
            <li>
                <a >{{$subCategory->title}} @if(count($subCategory->child))<span class="fa fa-caret-right"></span> @endif</a>

                @include('home._category_tree',['child'=>$subCategory->child])
            </li>
        @else
            <li> <a href="{{route('get_hotels_via_category',['category_id'=>$subCategory->id])}}">{{$subCategory->title}}</a></li>
        @endif
    </ul>
@endforeach
