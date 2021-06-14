@extends('adminlte::page')

@section('title', 'Editar Paciente')

@section('content_header')
    <h1>Editar Paciente</h1>
@stop

@section('content')
    <form action="/pacientes/{{$paciente->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Tipo de Documento</label>
            <select class="form-select" aria-label="Default select example" id="tipo_documento" name="tipo_documento" 
                value="{{$paciente->tipo_documento}}">
                <option value="01">DNI</option>
                <option value="04">CARNET EXT</option>
                <option value="06">RUC</option>
                <option value="07">PASAPORTE</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Número de documento</label>
            <input type="number" class="form-control" id="doi" name="doi" tabindex="1" value="{{$paciente->doi}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" tabindex="2" value="{{$paciente->nombre}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" tabindex="3" 
                value="{{$paciente->fecha_nacimiento}}" >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" tabindex="4" value="{{$paciente->email}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="celular" name="celular" tabindex="5" value="{{$paciente->celular}}">
        </div>
        <a href="/pacientes" class="btn btn-secondary" tabindex="6">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop