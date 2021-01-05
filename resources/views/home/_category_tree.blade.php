<!-- call sub-category recursively -->
@foreach($child as $subCategory)
    <ul class="sub-menu">
        @if(count($subCategory->child))
            <li>
                <a href="room-1.html">{{$subCategory->title}} @if(count($subCategory->child))<span class="fa fa-caret-right"></span> @endif</a>

                @include('home._category_tree',['child'=>$subCategory->child])
            </li>
        @else
            <li> <a href="room-1.html">{{$subCategory->title}}</a></li>
        @endif
    </ul>
@endforeach
