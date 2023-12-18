<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\DataLoad;
use App\Models\Load;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('report.index'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        DataLoad::create([
            'load_id' => 2,
            'longitude' => 0,
            'latitude' => 0,
            'day' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'flow_sensor' => random_int(100,1000),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }

    public function update_flow_sensor_chart(Request $request)
    {
        //
        #$query = DataLoad::where('load_id', 2)->orderBy('created_at', 'desc')->take(1);
        $latestData = DataLoad::where('load_id',2)->latest()->first();
        
        if ($latestData) {
            #$latestData->created_at = \Carbon\Carbon::parse($latestData->created_at)->format('H:i:s');
            if($latestData->updated_chart == 0){
                $latestData->update([
                    'updated_chart' => 1
                ]);
                $data = [
                    'labels' => $latestData->time,
                    'values' => json_decode($latestData->flow_sensor),
                    #'labels' => \Carbon\Carbon::parse($latestData->created_at)->format('H:i:s'),#json_decode($latestData->create_at),
                    #'values' => $latestData->flow_sensor,#json_decode($latestData->flow),
                ];
                return response()->json($data);
            }else {
                // Si no hay datos, devuelve una respuesta vacía
                return response()->json([]);
            }
            
        } else {
            // Si no hay datos, devuelve una respuesta vacía
            return response()->json([]);
        }
        #return response()->json($data);
    }
    public function update_truck_load_chart(Request $request)
    {

        #$query = DataLoad::where('load_id', 2)->orderBy('created_at', 'desc')->take(1);
        $latestData = DataLoad::where('load_id',2)->orderBy('id','desc')->sum('volumen');
        
        if ($latestData) {
            $data = ['values' => 3000-$latestData];
            return response()->json($data);
        } else {
            $data = ['values' => 3000];
            return response()->json($data);
        }
    }
}
