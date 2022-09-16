@extends('layouts.app')

@section('template_title')
    Estudiante
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estudiantes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estudiantes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo Estudiante') }}
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
                            <table class="table table-striped table-hover" id="MiTabla">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>

										<th>Nombre</th>
										<th>Categoría</th>
										<th>Celular</th>
										{{-- <th>Fnacimiento</th> --}}
										<th>Posicion</th>
										{{-- <th>Eps</th> --}}
										<th>Tiposangre</th>
										<th>Responsable1</th>
										<th>Cel R1</th>
										{{-- <th>Responsable2</th>
										<th>Cel R2</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estudiantes as $estudiante)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}
                                            <td>{{ $estudiante->id }}</td>

											<td>{{ $estudiante->nombre }}</td>
											<td>{{ $estudiante->categoria->nombrecat }}</td>
											<td>{{ $estudiante->celular }}</td>
											{{-- <td>{{ $estudiante->fNacimiento }}</td> --}}
											<td>{{ $estudiante->posicion }}</td>
											{{-- <td>{{ $estudiante->eps }}</td> --}}
											<td>{{ $estudiante->tiposangre }}</td>
											<td>{{ $estudiante->responsable1 }}</td>
											<td>{{ $estudiante->celr1 }}</td>
                                            {{-- <td>{{ $estudiante->responsable2 }}</td>
											<td>{{ $estudiante->celr2 }}</td> --}}

                                            <td>
                                                <form action="{{ route('estudiantes.destroy',$estudiante->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info " href="{{ route('estudiantes.show',$estudiante->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('estudiantes.edit',$estudiante->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $estudiantes->links() !!}
            </div>
        </div>
    </div>

    {{-- DataTable --}}
    <script>
        var tabla= document.querySelector("#MiTabla")
        var dataTable = new DataTable(tabla,{
            perPage:20
        });
    </script>

@endsection
