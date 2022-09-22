@extends('layouts.app')

@section('template_title')
    Item
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <u><strong>Pagos:</strong></u>
                            </span>
                            <select tye="button" value=" " class="btn btn-outline-secondary" placeholder="Categoria">
                                <option value=""></option>
                                @foreach ($categorias as $categoria)
                                    {{-- <option value="">{{++$i}}</option> --}}
                                    <option class="lasCategorias" value="  ">{{ $categoria}}</option>
                                @endforeach
                            </select>



                             <div class="float-right">
                                <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <strong>Crear Nuevo Pago</strong>
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
                                        {{-- <th>No</th> --}}

										{{-- <th>Idevento</th> --}}
										<th>Evento</th>
										<th>N.Documento</th>
										<th>NombreEs</th>
										<th>Categoria</th>
										<th>valor</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            {{-- <td>{{ ++$i }}</td> --}}

											{{-- <td>{{ $item->idEvento }}</td> --}}
											<td>{{ $item->evento->nombre }}</td>
											<td>{{ $item->idEstudiante }}</td>
											<td>{{ $item->estudiante->nombre }}</td>
											<td>{{ $item->estudiante->categoria->nombrecat }}</td>
											<td>{{ $item->evento->valor }}</td>
                                            @if ($item->finalizado==null)
                                                <td style="color: red">Pendiente</td>
                                            @else
                                                <td style="color: green">Pagado</td>
                                            @endif


                                            <td>
                                                <form action="{{ route('items.destroy',$item->id) }}" method="POST">
                                                    @if ($item->finalizado==null)
                                                    {{-- <a class="btn btn-sm btn-info " href="{{ route('items.show',$item->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('items.pagar',$item->id) }}"><i class="fa fa-fw fa-edit"></i> Pagar </a>
                                                    @else
                                                    <a class="btn btn-sm btn-success" href="{{ route('items.retirar',$item->id) }}"><i class="fa fa-fw fa-edit"></i> Retirar </a>

                                                    @endif
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
                {!! $items->links() !!}
            </div>
        </div>
    </div>
    <script >
        var categorias = document.getElementsByClassName("lasCategorias");
        console.log(categorias)
        var cats=[];
        for( var obj of categorias){
            console.log(obj.innerHTML);
            cats.push(obj.innerText);

        }
        console.log(cats)

    </script>
@endsection
