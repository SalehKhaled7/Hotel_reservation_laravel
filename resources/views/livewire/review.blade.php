<div>

    @auth
        <h3 class="comment-reply-title">LEAVE A COMMENT</h3>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <form wire:submit.prevent="store"  class="comment-form" >
        @csrf
        <div class="row">

            <div class="col-sm-5">
                <input type="text"  class="field-text" wire:model="subject"  placeholder="Subject" style="border: 1px solid">
                @error('subject')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="col-sm-12">
                <textarea placeholder="Your comment"  wire:model="review" class="field-textarea" rows="4" style="border: 1px solid"></textarea>
                @error('review')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-12">
                <button type="submit" class="awe-btn awe-btn-14" style="border: 1px solid">SUBMIT COMMENT</button>
            </div>
        </div>
    </form>
    @else
        <h3 class="comment-reply-title">login to write a comment ...</h3>
    @endauth
</div>
