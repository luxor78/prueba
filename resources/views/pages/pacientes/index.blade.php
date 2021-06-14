@extends('adminlte::page')

@section('title', 'Pacientes')
@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Pacientes</h1>
@stop

@section('content')
<a href="pacientes/create" class="btn btn-primary mb-3">CREAR</a>
    <table id="pacientes" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Doi</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->doi}}</td>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->celular}}</td>
                    <td>{{$p->email}}</td>
                    <td>
                        <form action="{{ route('pacientes.destroy', $p->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/pacientes/{{$p->id}}/edit" class="btn btn-info">Editar</a>
                            <button type="submit" class="btn btn-danger delete-confirm">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                //data table
                $('#pacientes').DataTable();
                //delete button
                $('.delete-confirm').click(function(event){
                    var form = $(this).closest("form");
                    event.preventDefault();
                    Swal.fire({
                        title: 'Borrar Item',
                        text: "¿Esta seguro de eliminar este elemento?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.value) {
                            form.submit();
                        }    
                    })
                });
            });
        </script>
@stop