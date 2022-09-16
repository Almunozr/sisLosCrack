@extends('layouts.app')

@section('template_title')
    {{ $item->name ?? 'Show Item' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Asignar por Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Idevento:</strong>
                            {{ $item->idEvento }}
                        </div>
                        <div class="form-group">
                            <strong>Idestudiante:</strong>
                            {{ $item->idEstudiante }}
                        </div>
                        <div class="form-group">
                            <strong>Pago:</strong>
                            {{ $item->pago }}
                        </div>
                        <div class="form-group">
                            <strong>Finalizado:</strong>
                            {{ $item->finalizado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
