<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataLoad;
use App\Models\Load;
use Illuminate\Http\Request;

class DataLoadController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json('OK',200);
    }

    /**
     * Show the form for creating a new resource.
     */
    function create(Request $request) {
        try {
            //code...
            return response()->json('OK',200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th->getMessage()],500);
        }
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
