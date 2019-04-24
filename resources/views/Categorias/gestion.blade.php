
@extends('layouts.app')

@section('contenido')
<h1>{{$variable}}</h1>
<br>
<div class="container-fluid">
    @if(session('message'))
    <div class="alert alert-{{session('status')}}">
        {{session('message')}}
    </div>
    @endif
    <br>
    <a href="{{ route('categoria.crear') }}" class="tcb-small tcb-basic-d tcb-success">Crear Categoria</a>
    <br>
    <br>
    <table id="Categorias" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Titulo</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </thead>
        <tbody>
            @forelse($Categorias as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>

                <td>{{$categoria->users->name}}</td>
                <td>{{$categoria->users->surname}}</td>
                <td>{{$categoria->titulo}}</td>
                <td><a class="tcb-small tcb-basic-d tcb-info" href="{{  route('categoria.editar', ['id' => $categoria->id])}}" target="_self"><span>Editar</span></a></td>
                <td>
                    <a href="#" class="tcb-small tcb-basic-d tcb-warning" data-toggle="modal" data-target="#modalScaleUp{{$categoria->id}}">Eliminar</a>

                    <div class="modal tc-modal tc-animation-scale-up" id="modalScaleUp{{$categoria->id}}">
                        <div class="modal-dialog ">
                            <div class="modal-content modal-padding">
                                <div class="modal-header">
                                    <i class="fa fa-close close" data-dismiss="modal"></i>
                                    <h4 class="modal-title">Alerta Estas Seguro que deseas eliminar la Categoria {{$categoria->titulo}}</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Si lo eliminas No Hay marcha atras sera borrado de la Base de datos
                                        y no se puede recuperar,<br> no obstante si se puede volver a crear de nuevo</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="tcb-small tcb-basic-d tcb-success" data-dismiss="modal">No Eliminar</a>
                                    <a href='{{  route('categoria.eliminar', ['id' =>$categoria->id])}} ' target='_self'  class="tcb-small tcb-basic-d tcb-danger">Eliminar Definitivamente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>{{$categoria->created_at}}</td>
            </tr>
            @empty
            <tr>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
            </tr>
            @endForelse

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Titulo</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#Categorias').DataTable();
    });
</script>
@endsection
