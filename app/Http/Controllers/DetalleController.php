<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Detalle;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalles = DB::table('details')
        ->join('products', 'details.product_id', '=', 'products.id')
        ->select('details.*', 'products.name as product_name')
        ->get();

        return view('detalles.index', ['detalles' => $detalles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = DB::table('products')
        ->orderBy('name')
        ->get();

        return view('detalles.new', ['productos' => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalle = new Detalle();
        $detalle->invoice_id = $request->invoice_id;
        $detalle->product_id = $request->product_id;
        $detalle->quantity = $request->quantity;
        $detalle->price = $request->price;
        $detalle->save();

        $detalles = DB::table('details')
        ->join('products', 'details.product_id', '=', 'products.id')
        ->select('details.*', 'products.name as product_name')
        ->get();

        return view('detalles.index', ['detalles' => $detalles]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $detalle = Detalle::find($id);

        $productos = DB::table('products')
        ->orderBy('name')
        ->get();

        return view('detalles.edit', ['detalle' => $detalle, 'productos' => $productos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detalle = Detalle::find($id);

        $detalle->invoice_id = $request->invoice_id;
        $detalle->product_id = $request->product_id;
        $detalle->quantity = $request->quantity;
        $detalle->price = $request->price;
        $detalle->save();

        $detalles = DB::table('details')
        ->join('products', 'details.product_id', '=', 'products.id')
        ->select('details.*', 'products.name as product_name')
        ->get();

        return view('detalles.index', ['detalles' => $detalles]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle = Detalle::find($id);
        $detalle->delete();

        $detalles = DB::table('details')
        ->join('products', 'details.product_id', '=', 'products.id')
        ->select('details.*', 'products.name as product_name')
        ->get();

        return view('detalles.index', ['detalles' => $detalles]);
    }
}
