<div class="box box-info padding-1">
    <div class="box-body">
        {{-- @if(Route::is('estudiantes.create') ) --}}
        <div class="form-group">
            {{ Form::label('N. Documento*') }}
            {{ Form::text('id', $estudiante->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'N. Documento']) }}
            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- @endif --}}
        {{-- <div class="form-group">
            {{ Form::label('Número de identificación') }}
            {{ Form::text('id', $estudiante->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'N. Identificacion']) }}
            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('nombre*') }}
            {{ Form::text('nombre', $estudiante->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('idCategoria') }}
            {{ Form::text('idCategoria', $estudiante->idCategoria, ['class' => 'form-control' . ($errors->has('idCategoria') ? ' is-invalid' : ''), 'placeholder' => 'Idcategoria']) }}
            {!! $errors->first('idCategoria', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('Categoría*') }}
            {{ Form::select('idCategoria', $categorias, $estudiante->idCategoria, ['class' => 'form-control' . ($errors->has('idCategoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoría']) }}
            {!! $errors->first('idCategoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('celular') }}
            {{ Form::text('celular', $estudiante->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) }}
            {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha Nacimiento (MM/DD/AAAA)') }}
            {{ Form::date('fNacimiento', $estudiante->fNacimiento, ['class' => 'form-control' . ($errors->has('fNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fnacimiento']) }}
            {!! $errors->first('fNacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('posición') }}
            {{ Form::text('posicion', $estudiante->posicion, ['class' => 'form-control' . ($errors->has('posicion') ? ' is-invalid' : ''), 'placeholder' => 'Posición']) }}
            {!! $errors->first('posicion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('EPS') }}
            {{ Form::text('eps', $estudiante->eps, ['class' => 'form-control' . ($errors->has('eps') ? ' is-invalid' : ''), 'placeholder' => 'Eps']) }}
            {!! $errors->first('eps', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipos de sangre') }}
            {{ Form::text('tiposangre', $estudiante->tiposangre, ['class' => 'form-control' . ($errors->has('tiposangre') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de sangre']) }}
            {!! $errors->first('tiposangre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre de Responsable 1') }}
            {{ Form::text('responsable1', $estudiante->responsable1, ['class' => 'form-control' . ($errors->has('responsable1') ? ' is-invalid' : ''), 'placeholder' => 'Nombre responsable 1']) }}
            {!! $errors->first('responsable1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Celurar Responsable 1') }}
            {{ Form::text('celr1', $estudiante->celr1, ['class' => 'form-control' . ($errors->has('celr1') ? ' is-invalid' : ''), 'placeholder' => '###']) }}
            {!! $errors->first('celr1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre de Responsable 2') }}
            {{ Form::text('responsable2', $estudiante->responsable2, ['class' => 'form-control' . ($errors->has('responsable2') ? ' is-invalid' : ''), 'placeholder' => 'Nombre responsable 2']) }}
            {!! $errors->first('responsable2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Celular Responsable 2') }}
            {{ Form::text('celr2', $estudiante->celr2, ['class' => 'form-control' . ($errors->has('celr2') ? ' is-invalid' : ''), 'placeholder' => '###']) }}
            {!! $errors->first('celr2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Detalles') }}
            {{ Form::text('detalle', $estudiante->detalle, ['class' => 'form-control' . ($errors->has('detalle') ? ' is-invalid' : '')]) }}
            {!! $errors->first('detalle', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
