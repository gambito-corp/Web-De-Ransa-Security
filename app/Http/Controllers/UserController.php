<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Faker\Provider\Image;
Use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
Use App\User;

class UserController extends Controller {

    /**
     * Display a Testing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test() {
        return "ok";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = \Auth::user();
        if (!$user || $user->role == 'user' || $user->role == 'User' || $user->role == 'Cliente' || $user->role == 'Personal') {
            return redirect()->route('inicio');
        } elseif ($user->role == 'Administrador' || $user->role == 'SuperAdmin') {
            $variable = 'Control De Usuarios';
            $user = User::all();
            return view('User.gestion', ['variable' => $variable,
                'usuarios' => $user
            ]);
        } else {
            return redirect()->route('inicio');
        }
    }

    public function config() {
        $user = \Auth::user();
        if (!$user) {
            return redirect()->route('inicio');
        } else {
            $variable = 'Actualizacion de Usuario';
            return view('User.config', [
                'variable' => $variable
            ]);
        }
    }

    public function configUpdate(Request $request) {
        //Consegir el usuario identificado
        $user = \Auth::user();
        if (!$user) {
            return redirect()->route('inicio');
        } else {
            $id = \Auth::user()->id;
            //validacion del servidor
            $validate = $this->validate($request, [
                'name' => 'required', 'string', 'max:255',
                'surname' => 'required', 'string', 'max:255',
                'telefono' => 'required', 'integer',
                'empresa' => 'required', 'string', 'max:255',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:users, email,' . $id,
            ]);

//recoger los datos del usuario
            $name = $request->input('name');
            $surname = $request->input('surname');
            $empresa = $request->input('empresa');
            $telefono = $request->input('telefono');
            $email = $request->input('email');
            //asignar valores al objeto del usuario
            $user->name = $name;
            $user->surname = $surname;
            $user->empresa = $empresa;
            $user->telefono = $telefono;
            $user->email = $email;

            // Subir la imagen
            $imagen = $request->file('imagen');
            if ($imagen) {
                //poner nombre unico
                $imagen_name = time() . $imagen->getClientOriginalName();
                //guardamos en la carpeta users de (storage/app/user)
                Storage::disk('user')->put($imagen_name, File::get($imagen));
                //seteo el objeto
                $user->imagen = $imagen_name;
            }

            //ejecutar consulta y cambios en la BD
            $update = $user->update();
            if ($update) {
                return redirect()->route('usuarios.config')
                                ->with(['status' => 'success', 'message' => 'Usuario actualizado correctamente']);
            } else {
                return redirect()->route('usuarios.config')
                                ->with(['status' => 'danger', 'message' => 'Fallo al actualizar usuario']);
            }
        }
    }

    public function getImagen($filename) {
        $file = Storage::disk('user')->get($filename);
        return new Response($file, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            //cargo usuario especifico de la BD
            $user = user::find($id);
            $variable = 'Editar Usuario ' . $user->name;
            //paso a la vista el array u la variable editar
            return view('User.edit', [
                'user' => $user,
                'variable' => $variable
            ]);
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $id = $request->input('id');
//validcion
            $validate = $this->validate($request, [
                'imagen' => 'image'
            ]);
            //recoger los datos del usuario
            $role = $request->input('role');
            $name = $request->input('name');
            $surname = $request->input('surname');
            $empresa = $request->input('empresa');
            $telefono = $request->input('telefono');
            $email = $request->input('email');
            //recojer objeto usuario para setearlo correctamente con los datos actualizados
            $usuario = user::find($id);
            //recoger imagen
            $imagen = $request->file('imagen');
            if ($imagen) {
                //poner nombre unico
                $imagen_name = time() . $imagen->getClientOriginalName();
                //guardamos en la carpeta users de storage/app/users
                Storage::disk('user')->put($imagen_name, File::get($imagen));
                //seteo el objeto
                $usuario->imagen = $imagen_name;
            }
            //seteo objeto
            $usuario->role = $role;
            $usuario->name = $name;
            $usuario->surname = $surname;
            $usuario->empresa = $empresa;
            $usuario->telefono = $telefono;
            $usuario->email = $email;
            //actualizar objeto usuario
            $update = $usuario->update();
            if ($update) {
                return redirect()->route('usuarios.gestion')
                                ->with(['status' => 'success', 'message' => 'Usuario actualizado correctamente']);
            } else {
                return redirect()->route('usuarios.gestion')
                                ->with(['status' => 'danger', 'message' => 'Fallo al actualizar usuario']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (\Auth::user()->role == 'SuperAdmin' || \Auth::user()->role == 'Administrador') {
            $usuario = User::find($id);
            //eliminar Storage
            if (isset($usuario->imagen) && $usuario->imagen != 'user.png') {
                Storage::disk('user')->delete($usuario->imagen);
            }
            //eliminar registro
            $delete = $usuario->delete();
            if ($delete) {
                return redirect()->route('usuarios.gestion')
                                ->with(['status' => 'success', 'message' => 'Usuario eliminado correctamente']);
            } else {
                return redirect()->route('usuarios.gestion')
                                ->with(['status' => 'danger', 'message' => 'Fallo al eliminar usuario']);
            }
        } else {
            return redirect()->route('inicio');
        }
    }

    public function password() {
        return view('User.password');
    }

    public function ActualizarPassword(Request $request) {
        $input = $request->all();
        $user = User::find(\Auth()->user()->id);
        if (!Hash::check($input['pass'], $user->password)) {
            $respuesta = array(
                'ruta' => 'usuarios.password',
                'status' => 'danger',
                'mensaje' => 'no introduciste tu contraseña antigua correctamente'
            );
        } else {
            $validate = $this->validate($request, [
                'pass' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required'
            ]);
            $passNew = $request->password;
            $passNewConfirm = $request->password_confirmation;
            if ($passNew != $passNewConfirm) {
                $respuesta = array(
                    'ruta' => 'usuarios.password',
                    'status' => 'danger',
                    'mensaje' => 'las Contraseñas nuevas deben ser iguales'
                );
            } else {
                $passNewHash = Hash::make($passNew, [
                            'memory' => 1024,
                            'time' => 2,
                            'threads' => 2,
                            'rounds' => 12,
                ]);
                $check = Hash::check($passNew, $passNewHash);
                if (!$check) {
                    $respuesta = array(
                        'ruta' => 'usuarios.password',
                        'status' => 'danger',
                        'mensaje' => 'Fallo al actualizar la Contraseña, no funciono el Hash'
                    );
                } else {
                    $user->password = $passNewHash;
                    $update = $user->update();
                    if (!$update) {
                        $respuesta = array(
                            'ruta' => 'usuarios.password',
                            'status' => 'danger',
                            'mensaje' => 'Fallo al actualizar la Contraseña'
                        );
                    } else {
                        $respuesta = array(
                            'ruta' => 'usuarios.password',
                            'status' => 'success',
                            'mensaje' => 'Contraseña actualizada correctamente'
                        );
                    }
                }
            }
        }
        return redirect()->route($respuesta['ruta'])
                        ->with(['status' => $respuesta['status'], 'message' => $respuesta['mensaje']]);
    }

}
