<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\User;
Use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Faker\Provider\Image;
Use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $variable = 'Control De Clientes';
            $clientes = Cliente::all();
            return view('Clientes.gestion', ['variable' => $variable,
                'clientes' => $clientes
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
            $variable = 'Creacion De Cliente';
            return view('Clientes.crear', ['variable' => $variable]);
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
            $validate = $this->validate($request, [
                'nombre' => 'required', 'string',
                'telefono' => 'required', 'srting',
                'email' => 'required', 'string', 'max:255',
                'cargo' => 'required', 'string', 'max:255',
                'imagen' => 'required', 'image',
            ]);

            $nombre = $request->input('nombre');
            $telefono = $request->input('telefono');
            $email = $request->input('email');
            $imagen = $request->file('imagen');
            $cargo = $request->input('cargo');

            $imagen_name = time() . $imagen->getClientOriginalName();
            Storage::disk('cliente')->put($imagen_name, File::get($imagen));

            $cliente = new Cliente();
            $cliente->user_id = $id;
            $cliente->nombre = $nombre;
            $cliente->cargo = $cargo;
            $cliente->email = $email;
            $cliente->imagen = $imagen_name;
            $cliente->telefono = $telefono;
            $save = $cliente->save();
            if ($save) {
                return redirect()->route('cliente.gestion')->with(['status' => 'success', 'message' => 'Cliente Creado Correctamente']);
            } else {
                return redirect()->route('cliente.gestion')->with(['status' => 'danger', 'message' => 'Fallo al crear Cliente']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $cliente = Cliente::find($id);
            $variable = 'Actualizacioin de Cliente ' . $cliente->nombre;
            return view('Clientes.editar', ['variable' => $variable, 'cliente' => $cliente]);
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $validate = $this->validate($request, [
                'nombre' => 'required', 'string',
                'telefono' => 'required', 'srting',
                'email' => 'required', 'string', 'max:255',
                'cargo' => 'required', 'string', 'max:255',
            ]);
            $nombre = $request->input('nombre');
            $telefono = $request->input('telefono');
            $email = $request->input('email');
            $cargo = $request->input('cargo');
            $cliente = Cliente::find($id);

            $imagen = $request->file('imagen');
            if ($imagen) {
                //poner nombre unico
                $imagen_name = time() . $imagen->getClientOriginalName();
                //guardamos en la carpeta users de (storage/app/user)
                Storage::disk('cliente')->put($imagen_name, File::get($imagen));
                //seteo el objeto
                $cliente->imagen = $imagen_name;
            }

            $cliente->nombre = $nombre;
            $cliente->cargo = $cargo;
            $cliente->email = $email;
            $cliente->telefono = $telefono;
            $update = $cliente->Update();
            if ($update) {
                return redirect()->route('cliente.gestion')->with(['status' => 'success', 'message' => 'Imagen Creada Correctamente']);
            } else {
                return redirect()->route('cliente.gestion')->with(['status' => 'danger', 'message' => 'Fallo al crear la imagen']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $cliente = Cliente::find($id);
//eliminar Storage
            if (isset($cliente->imagen)) {
                Storage::disk('cliente')->delete($cliente->imagen);
            }
//eliminar registro
            $delete = $cliente->delete();
            if ($delete) {
                return redirect()->route('cliente.gestion')
                                ->with(['status' => 'success', 'message' => 'Imagen eliminado correctamente']);
            } else {
                return redirect()->route('cliente.gestion')
                                ->with(['status' => 'danger', 'message' => 'Fallo al eliminar Imagen']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    public function getImagen($filename) {
        $file = Storage::disk('cliente')->get($filename);
        return new Response($file, 200);
    }

}
