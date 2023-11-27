<?php

namespace App\Http\Controllers;

use App\Models\DataLoad;
use App\Models\Load;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('load.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('load.load-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'archivo' => 'required|mimes:txt,csv',
            #mimes
            #'archivo' => ['required',File::types(['txt'])],
        ]);
        try {
            DB::transaction(function () use ($request) { 
                $load = Load::create([
                    'name' => $request->input('name'),
                    'user_id' => Auth::user()->id,
                    'type'=> 2,
                ]);
                $file = $request->file('archivo');
                if (!empty($file)) {
                    if ($file->isValid()) {
                        // Guarda la imagen en la librería de medios del producto
                        // Procesar el contenido del archivo línea por línea
                        $lineas = file($file->getPathname(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                        $contador = 0;
                        foreach ($lineas as $linea) {
                            // Omitir la primera línea
                            if ($contador === 0) {
                                $contador++;
                                continue;
                            }
                            // Dividir la línea por comas
                            $datos = explode(',', $linea);
                            $fecha_hora = explode(' ',$datos[0]);
                            // Crear un nuevo modelo y asignar los datos
                            DataLoad::create([
                                'load_id' => $load->id,
                                'longitude' => $datos[1],
                                'latitude' => $datos[2],
                                'day' => $fecha_hora[0],
                                'time' => $fecha_hora[1],
                                'flow_sensor' => $datos[3],
                            ]);
                            $contador++;
                        }
                        $load->addMedia($file)->toMediaCollection('file-load');
                    }
                }
            });
            return redirect()->route('load.index')
            ->with('notification_type', 'success')
            ->with('notification_message', 'Archivo cargado correctamente!');
        } catch (\Exception $e) {            
            return redirect()->route('load.create')->with('notification_type', 'danger')->with('notification_message', 'Error al cargar el archivo: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Load $load)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Load $load)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Load $load)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Load $load)
    {
        //
    }
}
