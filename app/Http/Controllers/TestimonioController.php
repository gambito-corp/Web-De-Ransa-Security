<?php

namespace App\Http\Controllers;

use App\Testimonio;
use App\User;
Use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Faker\Provider\Image;
Use Illuminate\Support\Facades\Storage;

class TestimonioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $variable = 'Control De Testimonios';
            $testimonios = Testimonio::all();
            return view('Testimonios.gestion', ['variable' => $variable,
                'testimonios' => $testimonios
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
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador' || \Auth::user()->role == 'Cliente') {
            $variable = 'Creacion De Testimonio';
            return view('Testimonios.crear', ['variable' => $variable]);
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
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador' || \Auth::user()->role == 'Cliente') {
            $id = \Auth::user()->id;
            $validate = $this->validate($request, [
                'nombre' => 'required', 'string',
                'cargo' => 'required', 'srting',
                'descripcion' => 'required', 'string', 'max:255',
                'imagen' => 'required', 'image',
                'empresa' => 'required', 'string', 'max:255',
                'url_empresa' => 'required', 'url', 'max:255',
            ]);

            $nombre = $request->input('nombre');
            $cargo = $request->input('cargo');
            $descripcion = $request->input('descripcion');
            $imagen = $request->file('imagen');
            $empresa = $request->input('empresa');
            $url_empresa = $request->input('url_empresa');
            $imagen_name = time() . $imagen->getClientOriginalName();
            Storage::disk('testimonio')->put($imagen_name, File::get($imagen));

            $testimonio = new Testimonio();
            $testimonio->user_id = $id;
            $testimonio->nombre = $nombre;
            $testimonio->cargo = $cargo;
            $testimonio->descripcion = $descripcion;
            $testimonio->imagen = $imagen_name;
            $testimonio->empresa = $empresa;
            $testimonio->url_empresa = $url_empresa;

            $save = $testimonio->save();
            if ($save) {
                return redirect()->route('testimonio.gestion')->with(['status' => 'success', 'message' => 'Testimonio Creada Correctamente']);
            } else {
                return redirect()->route('testimonio.gestion')->with(['status' => 'danger', 'message' => 'Fallo al crear Testimonio']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonio  $testimonio
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonio $testimonio) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonio  $testimonio
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador' || \Auth::user()->role == 'Cliente') {
            $testimonio = Testimonio::find($id);
            $variable = 'Aprobacion De Testimonio de ' . $testimonio->empresa;
            return view('Testimonios.editar', ['variable' => $variable, 'testimonio' => $testimonio]);
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonio  $testimonio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $validate = $this->validate($request, [
                'nombre' => 'required', 'string',
                'cargo' => 'required', 'srting',
                'descripcion' => 'required', 'string', 'max:255',
                'imagen' => 'required', 'image',
                'empresa' => 'required', 'string', 'max:255',
                'url_empresa' => 'required', 'url', 'max:255',
            ]);

            $nombre = $request->input('nombre');
            $cargo = $request->input('cargo');
            $descripcion = $request->input('descripcion');

            $empresa = $request->input('empresa');
            $url_empresa = $request->input('url_empresa');
            $aprobar = $request->input('aprobar');
            $testimonio = Testimonio::find($id);
            $testimonio->nombre = $nombre;
            $testimonio->cargo = $cargo;
            $testimonio->descripcion = $descripcion;

            $testimonio->empresa = $empresa;
            $testimonio->url_empresa = $url_empresa;
            $testimonio->aprobado = $aprobar;


            $imagen = $request->file('imagen');
            if ($imagen) {
//poner nombre unico
                $imagen_name = time() . $imagen->getClientOriginalName();
//guardamos en la carpeta users de storage/app/users
                Storage::disk('testimonio')->put($imagen_name, File::get($imagen));
//seteo el objeto
                $testimonio->imagen = $imagen_name;
            }
            $update = $testimonio->update();
            if ($update) {
                return redirect()->route('testimonio.gestion')->with(['status' => 'success', 'message' => 'Testimonio actualizada Correctamente']);
            } else {
                return redirect()->route('testimonio.gestion')->with(['status' => 'danger', 'message' => 'Fallo al actualizar testimonio']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonio  $testimonio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $testimonio = Testimonio::find($id);
//eliminar Storage
            if (isset($testimonio->imagen)) {
                Storage::disk('testimonio')->delete($testimonio->imagen);
            }
//eliminar registro
            $delete = $testimonio->delete();
            if ($delete) {
                return redirect()->route('testimonio.gestion')
                                ->with(['status' => 'success', 'message' => 'Testimonio eliminado correctamente']);
            } else {
                return redirect()->route('testimonio.gestion')
                                ->with(['status' => 'danger', 'message' => 'Fallo al eliminar testimonio']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    public function getImagen($filename) {
        $file = Storage::disk('testimonio')->get($filename);
        return new Response($file, 200);
    }

}
