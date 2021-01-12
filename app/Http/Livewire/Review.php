<?php

namespace App\Http\Livewire;

use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    public $record,$subject,$review,$hotel_id;

    public function mount($id){
        $this->record=Hotel::findOrFail($id);
        $this->hotel_id = $this->record->id;
    }
    public function render()
    {
        return view('livewire.review');
    }
    public function store(){

        $this->validate([
           'subject'=>'required|min:5',
           'review'=>'required|min:10',
        ]);

        \App\Models\Review::create([

            'hotel_id'=>$this->hotel_id,
            'user_id'=>Auth::id(),
            'ip'=>$_SERVER['REMOTE_ADDR'],
            'rate'=>5,
            'subject'=>$this->subject,
            'review'=>$this->review
        ]);

        session()->flash('message','comment added successfully .');
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->subject=null;
        $this->review=null;
        $this->hotel_id=null;
        $this->ip=null;
    }
}
