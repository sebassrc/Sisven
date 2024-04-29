<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('customers')->get();
        return view('customers.index', ['customers' => $customers]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.new');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        DB::table('customers')->insert([
            'document_number' => $request->document_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
        ]);
        
        return redirect()->route('customers.index')->with('success', 'Cliente creado exitosamente.');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        $customer = DB::table('customers')->find($id);
        return view('customers.edit', ['customer' => $customer]);
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
       

        $customers = DB::table('customers')->where('id', $id)->update([
            'document_number' => $request->document_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
        ]);
    
        return redirect()->route('customers.index')->with('success', 'Cliente actualizado exitosamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $customers= DB::table('customers')->where('id', $id)->delete();
        
        return redirect()->route('customers.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
