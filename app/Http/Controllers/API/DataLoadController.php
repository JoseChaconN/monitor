<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataLoad;
use App\Models\Load;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataLoadController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return response()->json('OK GET',200);
        } catch (\Exception $e) {
            response()->json(['error' => $e->getMessage()],500);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    function create(Request $request) {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {               
                DataLoad::create([
                    'load_id' => 2,
                    'longitude' => $request->input('longitude'),
                    'latitude' => $request->input('latitude'),
                    'day' => date('Y-m-d'),
                    'time' => date('H:i:s'),
                    'flow_sensor' => $request->input('flow_sensor'),
                ]);
            });
            return response()->json('OK STORE',200);
        } catch (\Exception $e) {
            response()->json(['error' => $e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $data['data'] = Load::with('data_load','user_load')->find($id);
        #dd($dataLoad);
        return view('data-load.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataLoad $dataLoad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataLoad $dataLoad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataLoad $dataLoad)
    {
        //
    }
}
