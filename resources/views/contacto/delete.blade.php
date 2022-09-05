@extends('layouts.layout')
@section('content')
<div class="card">
    <h5 class="card-header">Eliminar una persona!</h5>
    <div class="card-body">
        
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
                Estas seguro de eliminar este registro!!!

                <table class="table table-sm table-hover table-bordered" style="background-color: white">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $contactos->nombre }}</td>
                            <td>{{ $contactos->apellido }}</td>
                            <td>{{ $contactos->telefono }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <form action="{{ route('contactos.destroy', $contactos->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route("contacto.index") }}" class="btn btn-info" >
                        <span class="fas fa-undo-alt"></span> Regresar
                    </a>
                    <button class="btn btn-danger">
                        <span class="fas fa-user-times"></span> Eliminar 
                    </button>
                </form>
            </div>
        </p>
        
    </div>
</div>
@endsection