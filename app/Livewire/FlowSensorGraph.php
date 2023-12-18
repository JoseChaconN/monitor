<?php

namespace App\Livewire;

use App\Models\DataLoad;
use Livewire\Component;

class FlowSensorGraph extends Component
{
    public $data;
/* 
    public function mount()
    {
        $this->loadData();
    } */

    public function render()
    {
        
        $data['label'] = DataLoad::where('load_id', 2)
        ->orderBy('id', 'desc')
        ->take(20)
        ->pluck('created_at')
        ->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('H:i:s');
        })
        ->toArray();
        
        $data['datas'] = DataLoad::where('load_id',2)->orderBy('id','desc')->take(20)->pluck('flow_sensor');
        
        return view('livewire.flow-sensor-graph',$data);
    }

   /*  public function updateData()
    {
        $this->loadData();
        $this->dispatch('dataUpdated', $this->data);
    } */

    /* private function loadData()
    {
        // Lógica para cargar datos desde el modelo
        #$dataFromModel = DataLoad::orderBy('created_at')->pluck('flow_sensor')->toArray();
        #$created_at_values = DataLoad::orderBy('created_at')->pluck('created_at')->toArray();
        // Ejemplo de datos de prueba
        $created_at_values = [
            '2023-12-15 08:00:00',
            '2023-12-15 08:10:00',
            '2023-12-15 08:20:00',
            '2023-12-15 08:30:00',
            '2023-12-15 08:40:00',
        ];

        $dataFromModel = [10, 15, 8, 20, 12];

        // Estructura de datos para un gráfico lineal
        $this->data = [
            'labels' => $this->formatLabels($created_at_values),
            'datasets' => [
                [
                    'label' => 'Flow Sensor Data',
                    'data' => $dataFromModel,
                    'fill' => false,
                    'borderColor' => 'rgb(75, 192, 192)',
                    'tension' => 0.1,
                ],
            ],
        ];
    } */

    /* private function formatLabels($created_at_values)
    {
        // Formatea las etiquetas utilizando el formato deseado
        return array_map(function ($created_at) {
            return (new \DateTime($created_at))->format('H:i:s');
        }, $created_at_values);
    } */
}
