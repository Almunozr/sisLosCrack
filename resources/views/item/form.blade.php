<div class="box box-info padding-1">
    <div class="box-body">

        @if(Route::is('items.create')){{-- Agrego funcion JS para asignar a todos los campos el valor escogido de idEvento --}}

            <div class="form-group">
                {{ Form::label('Evento*') }}
                {{ Form::select('idEvento[]',$eventos, $item->idEvento, ['class' => 'form-control eventoEscogido' . ($errors->has('idEvento') ? ' is-invalid' : ''), 'placeholder' => 'Evento']) }}
                {!! $errors->first('idEvento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @else
            <div class="form-group">
                {{ Form::label('Evento*') }}
                {{ Form::select('idEvento[]',$eventos, $item->idEvento, ['class' => 'form-control' . ($errors->has('idEvento') ? ' is-invalid' : ''), 'placeholder' => 'Idevento']) }}
                {!! $errors->first('idEvento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif
        <div class="form-group">
            {{ Form::label('idDeportista*') }}
            {{ Form::text('idEstudiante[]', $item->idEstudiante, ['class' => 'form-control' . ($errors->has('idEstudiante') ? ' is-invalid' : ''), 'placeholder' => 'IdDeportista']) }}
            {!! $errors->first('idEstudiante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('pago') }}
            {{ Form::text('pago', $item->pago, ['class' => 'form-control' . ($errors->has('pago') ? ' is-invalid' : ''), 'placeholder' => 'Pago']) }}
            {!! $errors->first('pago', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('finalizado (0:No / 1:Sí)') }}
            {{ Form::number('finalizado[]', $item->finalizado, ['class' => 'form-control' . ($errors->has('finalizado') ? ' is-invalid' : ''), 'placeholder' => 'Finalizado', 'min'=>'0', 'max'=>'1']) }}
            {{-- {!! $errors->first('finalizado', '<div class="invalid-feedback">:message</div>') !!} --}}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
