<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Estudiante;

/**
 * Class ItemController
 * @package App\Http\Controllers
 */
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(1000);
        $categorias=Categoria::pluck('nombrecat','id');

        return view('item.index', compact('items','categorias'))
            ->with('i', (request()->input('page', 1) - 1) * $items->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item();
        $eventos=Evento::pluck('nombre','id');
        $categorias=Categoria::pluck('nombrecat','id');
        $estudiantes=Estudiante::all(); #pluck('idCategoria','id');

        return view('item.create', compact('item','eventos','categorias','estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Item::$rules);
        $items = request()->except('_token');
        // dd($items);
        $idEventos= $items['idEvento'];
        //Trae entre los valores correctos de idEventos valores nulos. Por eso el filtro y ciclo
        $idEventos = array_filter($idEventos);
        for($j=0;$j<count($idEventos);$j++){
            $idEventos[$j]=$idEventos[0];//El primer valor es correcto, 2 no, 3ro sí, 4to no.....
        }
        $idEstudiantes= $items['idEstudiante'];
        $finalizados= $items['finalizado'];
        // dd($idEventos);
        for($i=0;$i<count($idEstudiantes);$i++){

            $item = new Item;
            $item->idEvento=$idEventos[$i];
            $item->idEstudiante=$idEstudiantes[$i];
            $item->finalizado=$finalizados[$i];
            $item->save();

        }
        #$item = Item::create($request->all());

        // foreach($datosPredeterminados as $data){
        //     $categoria = new Categoria();
        //     $categoria->nombrecat=$data['nombrecat'];
        //     $categoria->save();
        // }
        return redirect()->route('items.index')
        ->with('success', 'Pago Creado');
    }

    public function store2(Request $request)
    {
        foreach($request->idEvento as $pago)
            request()->validate(Item::$rules);

            $item = Item::create(['idEvento'=>$pago(0)],['idEstudiante'=>$pago(1)],['finalizado'=>$pago(2)]);

            return redirect()->route('items.index')
                ->with('success', 'Pago Creado');
    }

    public function store3(Request $request)
    {
        request()->validate(Item::$rules);

        $item = Item::create($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Pago Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);

        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $eventos=Evento::pluck('nombre','id');
        return view('item.edit', compact('item','eventos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        request()->validate(Item::$rules);
        // dd($item);
        $item->update($request->except('_token'));

        return redirect()->route('items.index')
            ->with('success', 'Pago Editado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $item = Item::find($id)->delete();

        return redirect()->route('items.index')
            ->with('success', 'Pago Eliminado');
    }

    public function pagar($id)
    {
        $item = Item::find($id)->update(['finalizado'=>'1']);

        return redirect()->route('items.index')
            ->with('success', 'Pago Actualizado');
    }
    public function retirar($id)
    {
        $item = Item::find($id)->update(['finalizado'=>null]);

        return redirect()->route('items.index')
            ->with('success', 'Pago Actualizado');
    }
}
