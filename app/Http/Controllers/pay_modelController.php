<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pay_mode;

class pay_modelController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payMode = pay_mode::all();
        return response()->json($payMode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return view for creating pay mode (if applicable)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'observation' => 'nullable|string|max:200',
        ]);

        $payMode = pay_mode::create($validated);
        return response()->json($payMode, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pay_mode  $payMode
     * @return \Illuminate\Http\Response
     */
    public function show(pay_mode $payMode)
    {
        return response()->json($payMode);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pay_mode  $payMode
     * @return \Illuminate\Http\Response
     */
    public function edit(pay_mode $payMode)
    {
        // Return view for editing pay mode (if applicable)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pay_mode  $payMode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pay_mode $payMode)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'observation' => 'nullable|string|max:200',
        ]);

        $payMode->update($validated);
        return response()->json($payMode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pay_mode  $payMode
     * @return \Illuminate\Http\Response
     */
    public function destroy(pay_mode $payMode)
    {
        $payMode->delete();
        return response()->json(null, 204);
    }
}
