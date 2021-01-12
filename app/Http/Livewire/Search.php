<?php

namespace App\Http\Livewire;

use App\Models\Hotel;
use Livewire\Component;

class Search extends Component
{
    public $search='';
    public function render()
    {
        $data_list=Hotel::where('title','like','%'.$this->search.'%');
        return view('livewire.search',['data_list'=>$data_list,'query'=>$this->search]);
    }
}
