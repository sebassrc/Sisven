<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = DB::table('categories')->get();
        return view('categorias.index', ['categorias' => $categorias]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.new');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000'
        ]);

        $categorias =  DB::table('categories')->insert([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        $categoria = DB::table('categories')->find($id);
        return view('categorias.edit', ['categoria' => $categoria]);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000'
        ]);

        $categorias = DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $categorias = DB::table('categories')->where('id', $id)->delete();
        
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
