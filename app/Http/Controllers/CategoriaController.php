<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Faker\Provider\Image;
Use Illuminate\Support\Facades\Storage;
Use App\Categoria;
use App\User;

class CategoriaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $variable = 'Control De Categorias';
            $categorias = Categoria::all();
            return view('Categorias.gestion', ['variable' => $variable,
                'Categorias' => $categorias
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
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $variable = 'Creacion De Categorias';
            return view('Categorias.crear', ['variable' => $variable]);
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
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            //Consegir el usuario identificado
            $user = \Auth::user();
            $id = \Auth::user()->id;
            //validacion del servidor
            $validate = $this->validate($request, ['titulo' => 'required', 'string', 'max:255',]);
            //recoger los datos del usuario
            $titulo = $request->input('titulo');
            //setear Objeto
            $cat = new Categoria();
            //asignar valores al objeto
            $cat->user_id = $id;
            $cat->titulo = $titulo;
            //ejecutar consulta y cambios en la BD
            $save = $cat->save();
            if ($save) {
                return redirect()->route('categoria.crear')
                                ->with(['status' => 'success', 'message' => 'Categoria creada Correctamente']);
            } else {
                return redirect()->route('categoria.crear')
                                ->with(['status' => 'danger', 'message' => 'Fallo Al Crear Categoria']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $cat = Categoria::find($id);
            $variable = 'Edicion De Categoria '.$cat->titulo;
            return view('Categorias.editar', ['variable' => $variable, 'categoria' => $cat]);
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $validate = $this->validate($request, ['titulo' => 'required', 'string', 'max:255',]);
            $titulo = $request->input('titulo');
            $user_id = $request->input('user_id');
            $cat = Categoria::find($id);
            $cat->user_id = $user_id;
            $cat->titulo = $titulo;
            $update = $cat->update();
            if ($update) {
                return redirect()->route('categoria.gestion')
                                ->with(['status' => 'success', 'message' => 'Categoria actualizada Correctamente']);
            } else {
                return redirect()->route('categoria.gestion')
                                ->with(['status' => 'danger', 'message' => 'Fallo Al actualizar Categoria']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $cat = Categoria::find($id);
            //eliminar registro
            $delete = $cat->delete();
            if ($delete) {
                return redirect()->route('categoria.gestion')
                                ->with(['status' => 'success', 'message' => 'Categoria Eliminada Correctamente']);
            } else {
                return redirect()->route('categoria.gestion')
                                ->with(['status' => 'danger', 'message' => 'Fallo Al Eliminar Categoria']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

}
