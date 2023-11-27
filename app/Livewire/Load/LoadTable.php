<?php

namespace App\Livewire\Load;

use App\Models\Load;
use Livewire\Component;
use Livewire\WithPagination;

class LoadTable extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        $data['load'] = Load::with('user_load')->where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.load.load-table',$data);
    }
}
