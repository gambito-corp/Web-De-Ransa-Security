<?php

namespace App\Http\Controllers;

use App\Incidencia;
use App\Cliente;
use App\User;
Use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Faker\Provider\Image;
Use Illuminate\Support\Facades\Storage;

class IncidenciaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $variable = 'Control De Incidencias';
            $incidencias = Incidencia::all();
            return view('Incidencias.gestion', ['variable' => $variable,
                'incidencias' => $incidencias
            ]);
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Personal') {
            $variable = 'Creacion De Incidencia';
            $clientes = Cliente::all();
            return view('Incidencias.crear', ['variable' => $variable, 'clientes' => $clientes]);
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Personal') {
            $id = \Auth::user()->id;
            $validate = $this->validate($request, [
                'cliente_id' => 'required', 'string',
                'prioridad' => 'required', 'string',
                'descripcion' => 'required', 'string', 'max:255',
            ]);
            $cliente_id = $request->input('cliente_id');
            $prioridad = $request->input('prioridad');
            $descripcion = $request->input('descripcion');
            $incidencia = new Incidencia();
            $incidencia->user_id = $id;
            $incidencia->cliente_id = $cliente_id;
            $incidencia->prioridad = $prioridad;
            $incidencia->descripcion = $descripcion;
            $save = $incidencia->save();
            if ($save) {
                return redirect()->route('incidencia.gestion')->with(['status' => 'success', 'message' => 'Incidencia registrada con exito']);
            } else {
                return redirect()->route('incidencia.gestion')->with(['status' => 'danger', 'message' => 'Fallo al registrar incidencia']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $incidencia) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $incidencia = Incidencia::find($id);
            //eliminar registro
            $delete = $incidencia->delete();
            if ($delete) {
                return redirect()->route('incidencia.gestion')
                                ->with(['status' => 'success', 'message' => 'Incidencia Eliminada Correctamente']);
            } else {
                return redirect()->route('incidencia.gestion')
                                ->with(['status' => 'danger', 'message' => 'Fallo Al Eliminar incidencia']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

}
