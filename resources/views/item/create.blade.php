@extends('layouts.app')

@section('template_title')
    Create Item
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    {{-- <div style="display: flex; justify-content: space-between; align-items: center;">

                    </div>     --}}
                    <div class="card-header">
                        <span class="card-title">Crear Pago:</span>
                        <button type="button" class="btn btn-warning btnPagoCategorias" onclick="pagoCategorias()">Para Todos</button>
                        <button type="button" class="btn btn-warning btnPagoUnico" onclick="pagoUnico()">Único</button>
                    </div>


                    <div class="card-body">
                        <form method="POST" class="pagoUnico"   style="display: none" action="{{ route('items.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('item.form')

                        </form>
                    <div class="pagoCategorias" style="display: none" >
                        {{-- <span>****************</span> --}}
                        <div class="box box-info padding-1">
                            <div class="form-group">
                                {{ Form::label('Evento') }} {{-- Asigno el mismo idEvento para todos los campos(escogido)--}}
                                {{ Form::select('otroName',$eventos, $item->idEvento, ['class' => 'form-control ', 'id' =>'asignarEvento','placeholder' => 'Evento']) }}
                                {{-- {!! $errors->first('idEvento', '<div class="invalid-feedback">:message</div>') !!} --}}
                            </div>
                        </div>

                        <div class="box box-info padding-1" style="display: none">
                            <div class="form-group">
                                <label >Categoría</label>
                                <select tye="button" id="asignarCategoria"  class="btn btn-outline-secondary" placeholder="Categoria">
                                    <option value=""></option>
                                    @foreach ($categorias as $categoria)
                                        {{-- <option value="">{{++$i}}</option> --}}
                                        <option class="lasCategorias" >{{ $categoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="box box-info padding-1">
                            <div class="form-group">
                                <label >Categoría</label>
                                <select tye="button" id="asignarCategoria"  class="btn btn-outline-secondary" placeholder="Categoria">
                                    <option value=""></option>
                                    @foreach ($categorias as $categoria)

                                        <option class="lasCategorias" >{{ $categoria->id}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        {{-- <span>****************</span> --}}
                        <form method="POST" action="{{ route('items.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            {{-- ****************** --}}

                            <div class="box box-info padding-1" style="display: none" >
                                <div class="box-body" id="oculto">{{-- style="display: none" OCULTAR  --}}
                                    @foreach ( $estudiantes as $estudiante)


                                        <div class="form-group">
                                            {{-- Asigno el mismo idEvento para todos los campos(escogido)--}}
                                            <label >*Evento*</label>
                                            <input type="text" name="idEvento[]" class="llenarEvento">
                                            {{-- {{ Form::label('*Evento') }}
                                            {{ Form::select('idEvento[]',$eventos, $item->idEvento, ['class' => 'form-control llenarEvento' . ($errors->has('idEvento') ? ' is-invalid' : ''), 'placeholder' => 'Idevento']) }} --}}
                                            {{-- {!! $errors->first('idEvento', '<div class="invalid-feedback">:message</div>') !!} --}}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('idEstudiante') }}
                                            {{ Form::text('idEstudiante[]', $estudiante->id, ['class' => 'form-control' . ($errors->has('idEstudiante') ? ' is-invalid' : ''), 'placeholder' => 'Idestudiante']) }}
                                            {{-- {!! $errors->first('idEstudiante', '<div class="invalid-feedback">:message</div>') !!} --}}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('finalizado') }}
                                            {{ Form::text('finalizado[]', $item->finalizado, ['class' => 'form-control' . ($errors->has('finalizado') ? ' is-invalid' : ''), 'placeholder' => 'Finalizado']) }}
                                            {{-- {!! $errors->first('finalizado', '<div class="invalid-feedback">:message</div>') !!} --}}
                                        </div>

                                    @endforeach


                                </div>
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" id="guardarF" style="display: none" class="btn btn-primary">*Guardar*</button>
                            </div>
                            <div class="box-footer mt20">
                                <button type="button" onclick="aplicarDatosFormulario()" class="btn btn-primary">Guardar</button>
                            </div>

                            {{-- ****** --}}


                        </form>
                    </div>


                        <script>

                                // v = document.querySelector(".dataTable-bottom");
                                // v.style.display="none";

                            function pagoUnico(){
                                pUnico = document.querySelector(".pagoUnico");
                                pCat = document.querySelector(".pagoCategorias");
                                btnPagoUnico= document.querySelector(".btnPagoUnico");
                                btnPagoCategorias= document.querySelector(".btnPagoCategorias");


                                // pUnico.innerHTML= "<button type="button" class="btn btn-warning" onclick="pagoUnico()"> <u> único </u></button>"

                                btnPagoUnico.style.textDecoration="underline";
                                btnPagoCategorias.style.textDecoration="none";
                                pUnico.style.display="block";
                                pCat.style.display="none";

                            }
                            function pagoCategorias(){
                                pUnico = document.querySelector(".pagoUnico");
                                pCat = document.querySelector(".pagoCategorias");
                                btnPagoCategorias= document.querySelector(".btnPagoCategorias");
                                btnPagoUnico= document.querySelector(".btnPagoUnico");


                                btnPagoCategorias.style.textDecoration="underline";
                                btnPagoUnico.style.textDecoration="none";

                                pUnico.style.display="none";
                                pCat.style.display="block";

                            }
                            function aplicarDatosFormulario(){
                                evento = document.querySelector("#asignarEvento").value;
                                categoria = document.querySelector("#asignarCategoria").value;
                                console.log("evento: ",evento,"  Categoría: ",categoria);
                                eventos = document.querySelectorAll(".llenarEvento");

                                for(var i=0;i<eventos.length; i++){
                                    eventos[i].innerHTML='<input class="form-control"  name="idEvento[]" type="text">';
                                    eventos[i].setAttribute("value",evento);

                                }
                                guardar = document.querySelector("#guardarF");
                                console.log(guardar)
                                guardar.click();
                            }

                            function generarFormulario(){
                                console.log("Entro a script");
                                var oculto = document.querySelector("#oculto");
                                oculto.innerHTML+='@foreach ( $estudiantes as $estudiante) <div class="form-group">    {{ Form::label('Evento') }} {{-- Asigno el mismo idEvento para todos los campos(escogido)--}}    {{ Form::select('idEvento[]',$eventos, $item->idEvento, ['class' => 'form-control idEv' . ($errors->has('idEvento') ? ' is-invalid' : ''), 'placeholder' => 'Idevento']) }} {!! $errors->first('idEvento', '<div class="invalid-feedback">:message</div>') !!}</div><div class="form-group">    {{ Form::label('idEstudiante') }}    {{ Form::text('idEstudiante[]', $estudiante->id, ['class' => 'form-control' . ($errors->has('idEstudiante') ? ' is-invalid' : ''), 'placeholder' => 'Idestudiante']) }}    {!! $errors->first('idEstudiante', '<div class="invalid-feedback">:message</div>') !!}</div><div class="form-group">    {{ Form::label('finalizado') }}    {{ Form::text('finalizado[]', $item->finalizado, ['class' => 'form-control' . ($errors->has('finalizado') ? ' is-invalid' : ''), 'placeholder' => 'Finalizado']) }}    {{-- {!! $errors->first('finalizado', '<div class="invalid-feedback">:message</div>') !!} --}}</div> @endforeach'
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
