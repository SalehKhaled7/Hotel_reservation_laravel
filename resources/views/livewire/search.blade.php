<div>
    <div class="col-sm-9">
        <input wire:model="search" name="search" type="text" class="field-text" placeholder="Hotel name"  list="mylist">
    </div>
    @if(!empty($query))
        <datalist id="mylist">
            @foreach($data_list as $rs)
                <option value="{{$rs->title}}"> {{$rs->title}} </option>
            @endforeach
        </datalist>
    @endif
</div>



