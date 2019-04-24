<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

use App\Testimonio;

Route::get('/', function () {
    $testimonios = Testimonio::where('aprobado', 1)->get();

    return view('welcome', ['testimonios' => $testimonios]);
})->name('inicio');

Auth::routes(['verify' => true]);

//rutas de vistas simples
// Route::get('/nosotros', 'HomeController@nosotros')->name('nosotros');
// Route::get('/servicios', 'HomeController@servicios')->name('servicios');
// Route::get('/contacto', 'HomeController@contacto')->name('contacto');
//rutas del controlador Galeria
//rutas de gestion de usuarios
Route::get('/Usuarios', 'UserController@index')->name('usuarios.gestion');
Route::get('/Usuarios/editar/{id}', 'UserController@edit')->name('usuarios.editar');
route::post('/Usuarios/editar', 'UserController@update')->name('usuarios.actualizar');
Route::post('/Usuarios/guardar', 'UserController@store')->name('usuarios.guardar');
Route::get('/configuracion', 'UserController@config')->name('usuarios.config');
Route::post('/configuracion', 'UserController@configUpdate')->name('usuarios.configUpdate');
route::get('/Usuarios/imagen/{filename}', 'UserController@getImagen')->name('user.imagen');
route::get('/Usuarios/eliminar/{id}', 'UserController@destroy')->name('user.eliminar');
Route::get('/Password', 'UserController@password')->name('usuarios.password');
Route::post('/password', 'UserController@ActualizarPassword')->name('usuarios.ActualizarPassword');
//Rutas de categorias
Route::get('/Categoria', 'CategoriaController@index')->name('categoria.gestion');
Route::get('/Categoria/nueva', 'CategoriaController@create')->name('categoria.crear');
route::post('/Categoria/nueva', 'CategoriaController@store')->name('categoria.guardar');
Route::get('/Categoria/{id}', 'CategoriaController@show')->name('categoria.mostrar');
Route::get('/Categoria/editar/{id}', 'CategoriaController@edit')->name('categoria.editar');
route::post('/Categoria/actualizado/{id}', 'CategoriaController@update')->name('categoria.actualizado');
route::get('/Categoria/eliminar/{id}', 'CategoriaController@destroy')->name('categoria.eliminar');
//Rutas de imagen
Route::get('/Galeria/gestion', 'ImagenController@gestion')->name('galeria.gestion');
Route::get('/Galeria', 'ImagenController@index')->name('galeria.index');
Route::get('/Galeria/nueva', 'ImagenController@create')->name('galeria.crear');
route::post('/Galeria/nueva', 'ImagenController@store')->name('galeria.guardar');
Route::get('/Galeria/{id}', 'ImagenController@show')->name('galeria.mostrar');
Route::get('/Galeria/editar/{id}', 'ImagenController@edit')->name('galeria.editar');
route::post('/Galeria/actualizado/{id}', 'ImagenController@update')->name('galeria.actualizado');
route::get('/Galeria/eliminar/{id}', 'ImagenController@destroy')->name('galeria.eliminar');
route::get('/Galeria/imagen/{filename}', 'ImagenController@getImagen')->name('galeria.imagen');
//Rutas de Testimonios
Route::get('/Testimonio', 'TestimonioController@index')->name('testimonio.gestion');
Route::get('/Testimonio/nueva', 'TestimonioController@create')->name('testimonio.crear');
route::post('/Testimonio/nueva', 'TestimonioController@store')->name('testimonio.guardar');
Route::get('/Testimonio/{id}', 'TestimonioController@show')->name('testimonio.mostrar');
Route::get('/Testimonio/editar/{id}', 'TestimonioController@edit')->name('testimonio.editar');
route::post('/Testimonio/actualizado/{id}', 'TestimonioController@update')->name('testimonio.actualizado');
route::get('/Testimonio/eliminar/{id}', 'TestimonioController@destroy')->name('testimonio.eliminar');
route::get('/Testimonio/imagen/{filename}', 'TestimonioController@getImagen')->name('testimonio.imagen');
//Rutas de Clientes
Route::get('/Clientes', 'ClienteController@index')->name('cliente.gestion');
Route::get('/Clientes/nueva', 'ClienteController@create')->name('cliente.crear');
route::post('/Clientes/nueva', 'ClienteController@store')->name('cliente.guardar');
Route::get('/Clientes/{id}', 'ClienteController@show')->name('cliente.mostrar');
Route::get('/Clientes/editar/{id}', 'ClienteController@edit')->name('cliente.editar');
route::post('/Clientes/actualizado/{id}', 'ClienteController@update')->name('cliente.actualizado');
route::get('/Clientes/eliminar/{id}', 'ClienteController@destroy')->name('cliente.eliminar');
route::get('/Clientes/imagen/{filename}', 'ClienteController@getImagen')->name('cliente.imagen');
//Rutas de Incidencias
Route::get('/Incidencias', 'IncidenciaController@index')->name('incidencia.gestion');
Route::get('/Incidencias/nueva', 'IncidenciaController@create')->name('incidencia.crear');
route::post('/Incidencias/nueva', 'IncidenciaController@store')->name('incidencia.guardar');
route::get('/Incidencias/eliminar/{id}', 'IncidenciaController@destroy')->name('incidencia.eliminar');
//Rutas de Contactos
Route::get('/Contacto', 'ContactoController@index')->name('contacto.gestion');
route::post('/Contacto/nueva', 'ContactoController@store')->name('contacto.guardar');
Route::get('/Contacto/editar/{id}', 'ContactoController@edit')->name('contacto.editar');
route::post('/Contacto/actualizado/{id}', 'ContactoController@update')->name('contacto.actualizado');
route::get('/Contacto/eliminar/{id}', 'ContactoController@destroy')->name('contacto.eliminar');
//rutas mailing
Route::get('enviar', function() {
    $data = [
        'link' => 'https://jesuschicano.es'
    ];
    \Mail::send('emails.notificacion', $data, function($msg) {
        $msg->from('gerencia@seguridadmya.tk', 'Jesús chicano');
        $msg->to('asesor.pedro@gmail.com')->subject('Notificación');
    });
}
);
//testing
// Route::get('/test', 'UserController@test')->name('test')->middleware('verified');
