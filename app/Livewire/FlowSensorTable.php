<?php

namespace App\Livewire;

use App\Models\DataLoad;
use Livewire\Component;
use Livewire\WithPagination;
class FlowSensorTable extends Component
{
    use WithPagination;

    public $search = '';
    /*public function search()
    {
        // Lógica de búsqueda aquí
        $this->data = DataLoad::where('load_id',2)->orderBy('created_at', 'desc')->paginate(50);// ... tus datos después de la búsqueda
    }*/
    
    public function render()
    {
        $data['data'] = DataLoad::where('load_id',2)->orderBy('id', 'desc')->paginate(10);
        return view('livewire.flow-sensor-table',$data);
    }
}
