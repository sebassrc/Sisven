<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detalle;
use Illuminate\Support\Facades\DB;


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

        return json_encode(['detalles'=>$detalles]);
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

        return json_encode(['detalles'=>$detalles]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // $detalle = Detalle::find($id);
        // $productos = DB::table('products')
        // ->orderBy('name')
        // ->get();

        // return json_encode(['detalle'=>$detalle, 'productos'=>$productos]);

        // Obtener el detalle específico
        $detalle = Detalle::find($id);

        // Obtener solo los productos relacionados con el detalle
        $productos = DB::table('products')
            ->join('details', 'products.id', '=', 'details.product_id')
            ->where('details.id', $id)
            ->orderBy('products.name')
            ->get();

        // Retornar el JSON con el detalle y los productos relacionados
        return response()->json(['detalle' => $detalle, 'productos' => $productos]);

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

        return json_encode(['detalles'=>$detalles]);

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

        return json_encode(['detalles'=>$detalles, 'succes'=>true]);
    }
}
