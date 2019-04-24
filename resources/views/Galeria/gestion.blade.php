
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
    <a href="{{ route('galeria.crear') }}" class="tcb-small tcb-basic-d tcb-success">Subir Imagen</a>
    <br>
    <br>
    <table id="Galeria" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del creador</th>
                <th>Categoria</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Empresa</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </thead>
        <tbody>
            @forelse($galerias as $galeria)
            <tr>
                <td>{{$galeria->id}}</td>

                <td>{{$galeria->users->name. ' '.$galeria->users->surname}}</td>
                <td>{{$galeria->categorias->titulo}}</td>
                <td>{{$galeria->titulo}}</td>
                <td>
                    @if($galeria->imagen)
                    <img src="{{Route('galeria.imagen', ['filename'=>$galeria->imagen])}}" alt="Imagen de {{$galeria->empresa}} en Ramsa Security" height="100"/>
                    @endif
                </td>
                <td>{{$galeria->descripcion}}</td>
                <td>{{$galeria->empresa}}</td>
                <td><a class="tcb-small tcb-basic-d tcb-info" href="{{  route('galeria.editar', ['id' => $galeria->id])}}" target="_self"><span>Editar</span></a></td>
                <td>
                    <a href="#" class="tcb-small tcb-basic-d tcb-warning" data-toggle="modal" data-target="#modalScaleUp{{$galeria->id}}">Eliminar</a>

                    <div class="modal tc-modal tc-animation-scale-up" id="modalScaleUp{{$galeria->id}}">
                        <div class="modal-dialog ">
                            <div class="modal-content modal-padding">
                                <div class="modal-header">
                                    <i class="fa fa-close close" data-dismiss="modal"></i>
                                    <h4 class="modal-title">Alerta Estas Seguro que deseas eliminar la Imagen {{$galeria->titulo}}</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Si lo eliminas No Hay marcha atras sera borrado de la Base de datos
                                        y no se puede recuperar,<br> no obstante si se puede volver a crear de nuevo</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="tcb-small tcb-basic-d tcb-success" data-dismiss="modal">No Eliminar</a>
                                    <a href='{{  route('galeria.eliminar', ['id' =>$galeria->id])}} ' target='_self'  class="tcb-small tcb-basic-d tcb-danger">Eliminar Definitivamente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>{{$galeria->created_at}}</td>
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
                <td>No hay</td>
                <td>No hay</td>
                <td>No hay</td>
            </tr>
            @endForelse

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre del creador</th>
                <th>Categoria</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Empresa</th>
                <th colspan="2">Acciones</th>
                <th>Creado en</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#Galeria').DataTable();
    });
</script>
@endsection
