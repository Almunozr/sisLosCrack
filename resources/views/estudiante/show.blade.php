@extends('layouts.app')

@section('template_title')
    {{ $estudiante->name ?? 'Show Estudiante' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            {{-- <span class="card-title">Show Estudiante</span> --}}
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estudiantes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>ID:</strong>
                            {{ $estudiante->id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estudiante->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Celular:</strong>
                            {{ $estudiante->celular }}
                        </div>
                        <div class="form-group">
                            <strong>Fnacimiento:</strong>
                            {{ $estudiante->fNacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Posicion:</strong>
                            {{ $estudiante->posicion }}
                        </div>
                        <div class="form-group">
                            <strong>EPS:</strong>
                            {{ $estudiante->eps }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de sangre:</strong>
                            {{ $estudiante->tiposangre }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable1:</strong>
                            {{ $estudiante->responsable1 }}
                        </div>
                        <div class="form-group">
                            <strong>Cel R1:</strong>
                            {{ $estudiante->celr1 }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable2:</strong>
                            {{ $estudiante->responsable2 }}
                        </div>
                        <div class="form-group">
                            <strong>Cel R2:</strong>
                            {{ $estudiante->celr2 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
