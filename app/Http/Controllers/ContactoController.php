<?php

namespace App\Http\Controllers;

use App\Contacto;
Use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Faker\Provider\Image;
Use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;

class ContactoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $variable = 'Control De Contactos';
            $clientes = Contacto::all();
            return view('Contactos.gestion', ['variable' => $variable,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validate = $this->validate($request, [
            'nombre' => 'required', 'string', 'max:255',
            'email' => 'required', 'email', 'max:255',
            'asunto' => 'required', 'string', 'max:255',
            'mensaje' => 'string',
        ]);
        if ($validate) {
            $nombre = $request->input('nombre');
            $correo = $request->input('email');
            $asunto = $request->input('asunto');
            $mensaje = $request->input('mensaje');

            $contacto = new Contacto();
            $contacto->nombre = $nombre;
            $contacto->email = $correo;
            $contacto->asunto = $asunto;
            $contacto->mensaje = $mensaje;
            $contacto->respuesta = 'no';

            //mandamos el email
            $data = array(
                'nombre' => $nombre,
                'correo' => $correo,
                'asunto' => $asunto,
                'mensaje' => $mensaje
                );

            

            $save = $contacto->save();


            if ($save) {
                mail::to('gerencia@seguridadmya.tk')->queue( new Email($data));
                return redirect()->route('inicio')
                                ->with(['status' => 'success', 'message' => 'Mensaje enviado exitosamente']);
            } else {
                return redirect()->route('inicio')
                                ->with(['status' => 'danger', 'message' => 'Fallo al enviar mensaje']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $cliente = Contacto::find($id);
            $variable = 'Seguimiento de contacto ' . $cliente->nombre;
            return view('Contactos.editar', ['variable' => $variable, 'cliente' => $cliente]);
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $validate = $this->validate($request, [
                'nombre' => 'required', 'string', 'max:255',
                'email' => 'required', 'email', 'max:255',
                'asunto' => 'required', 'string', 'max:255',
                'mensaje' => 'string',
                'respuesta' => 'required',
            ]);
            if ($validate) {
                $nombre = $request->input('nombre');
                $correo = $request->input('email');
                $asunto = $request->input('asunto');
                $mensaje = $request->input('mensaje');
                $respuesta = $request->input('respuesta');

                $contacto = Contacto::find($id);
                $contacto->nombre = $nombre;
                $contacto->email = $correo;
                $contacto->asunto = $asunto;
                $contacto->mensaje = $mensaje;
                $contacto->respuesta = $respuesta;

                $update = $contacto->update();
                if ($update) {
                    return redirect()->route('contacto.gestion')
                                    ->with(['status' => 'success', 'message' => 'Mensaje actualizado correctamente']);
                } else {
                    return redirect()->route('contacto.gestion')
                                    ->with(['status' => 'danger', 'message' => 'fallo al actualizar mensaje']);
                }
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $contacto = Contacto::find($id);
            //eliminar registro
            $delete = $contacto->delete();
            if ($delete) {
                return redirect()->route('contacto.gestion')
                                ->with(['status' => 'success', 'message' => 'Mensaje eliminado correctamente']);
            } else {
                return redirect()->route('contacto.gestion')
                                ->with(['status' => 'danger', 'message' => 'Fallo Al Eliminar mensaje']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

}
