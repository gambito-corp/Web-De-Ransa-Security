<?php

namespace App\Http\Controllers;

use App\Imagen;
Use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Faker\Provider\Image;
Use Illuminate\Support\Facades\Storage;
Use App\Categoria;
use App\User;

class ImagenController extends Controller {

    /**
     * Display a managment  the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gestion() {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $variable = 'Control De Imagenes';
            $galeria = Imagen::all();
            return view('Galeria.gestion', ['variable' => $variable,
                'galerias' => $galeria
            ]);
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $variable = 'Galeria De Imagenes';
        $galeria = Imagen::orderBy('categoria_id', 'desc')->paginate(12);
        return view('Galeria.index', ['variable' => $variable,
            'galerias' => $galeria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $variable = 'Creacion De Imagen';
            $categorias = Categoria::all();
            return view('Galeria.crear', ['variable' => $variable, 'categorias' => $categorias]);
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
            $id = \Auth::user()->id;
            $validate = $this->validate($request, ['categoria' => 'required', 'imagen' => 'required', 'image', 'titulo' => 'required', 'string', 'max:255', 'empresa' => 'required', 'string', 'max:255', 'descripcion' => 'required', 'string', 'max:255',]);
            $categoria = $request->input('categoria');
            $imagen = $request->file('imagen');
            $titulo = $request->input('titulo');
            $empresa = $request->input('empresa');
            $descripcion = $request->input('descripcion');
            $imagen_name = time() . $imagen->getClientOriginalName();
            Storage::disk('galeria')->put($imagen_name, File::get($imagen));
            $galeria = new Imagen();
            $galeria->user_id = $id;
            $galeria->categoria_id = $categoria;
            $galeria->imagen = $imagen_name;
            $galeria->titulo = $titulo;
            $galeria->empresa = $empresa;
            $galeria->descripcion = $descripcion;
            $save = $galeria->save();
            if ($save) {
                return redirect()->route('galeria.gestion')->with(['status' => 'success', 'message' => 'Imagen Creada Correctamente']);
            } else {
                return redirect()->route('galeria.gestion')->with(['status' => 'danger', 'message' => 'Fallo al crear la imagen']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $imagen) {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $categorias = Categoria::all();
            $galeria = Imagen::find($id);
            $variable = 'Actualizacion de Imagen ' . $galeria->titulo;
            return view('Galeria.editar', ['variable' => $variable, 'categorias' => $categorias, 'galeria' => $galeria]);
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $validate = $this->validate($request, ['categoria' => 'required', 'titulo' => 'required', 'string', 'max:255', 'empresa' => 'required', 'string', 'max:255', 'descripcion' => 'required', 'string', 'max:255',]);
            $user_id = $request->input('user');
            $categoria = $request->input('categoria');
            $titulo = $request->input('titulo');
            $empresa = $request->input('empresa');
            $descripcion = $request->input('descripcion');
            $galeria = Imagen::find($id);
            $galeria->user_id = $user_id;
            $galeria->categoria_id = $categoria;
            $galeria->titulo = $titulo;
            $galeria->empresa = $empresa;
            $galeria->descripcion = $descripcion;
            $imagen = $request->file('imagen');
            if ($imagen) {
//poner nombre unico
                $imagen_name = time() . $imagen->getClientOriginalName();
//guardamos en la carpeta users de storage/app/users
                Storage::disk('galeria')->put($imagen_name, File::get($imagen));
//seteo el objeto
                $usuario->imagen = $imagen_name;
            }
            $update = $galeria->update();
            if ($update) {
                return redirect()->route('galeria.gestion')->with(['status' => 'success', 'message' => 'Imagen actualizada Correctamente']);
            } else {
                return redirect()->route('galeria.gestion')->with(['status' => 'danger', 'message' => 'Fallo al actualizar la imagen']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $imagen = Imagen::find($id);
//eliminar Storage
            if (isset($imagen->imagen)) {
                Storage::disk('galeria')->delete($imagen->imagen);
            }
//eliminar registro
            $delete = $imagen->delete();
            if ($delete) {
                return redirect()->route('galeria.gestion')
                                ->with(['status' => 'success', 'message' => 'Imagen eliminada correctamente']);
            } else {
                return redirect()->route('galeria.gestion')
                                ->with(['status' => 'danger', 'message' => 'Fallo al eliminar Imagen']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    public function getImagen($filename) {
        $file = Storage::disk('galeria')->get($filename);
        return new Response($file, 200);
    }

}
