@extends('layouts.app')

@section('template_title')
    Evento
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Eventos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('eventos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Evento') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										<th>Descripción</th>
										<th>Valor</th>
										{{-- <th>Asignar</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventos as $evento)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $evento->nombre }}</td>
											<td>{{ $evento->descripcion }}</td>
											<td>{{ $evento->valor }}</td>
                                            {{-- <td><select tye="button" value=" " class="btn btn-outline-secondary" placeholder="Categoria">
                                                <option value=""></option>
                                                @foreach ($categorias as $categoria)

                                                    <option class="lasCategorias" value="  ">{{ $categoria}}</option>
                                                @endforeach
                                            </select></td> --}}

                                            <td>
                                                <form action="{{ route('eventos.destroy',$evento->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-info " href="{{ route('eventos.show',$evento->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a> --}}

                                                    <a class="btn btn-sm btn-success" href="{{ route('eventos.edit',$evento->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $eventos->links() !!}
            </div>
        </div>
    </div>
@endsection
