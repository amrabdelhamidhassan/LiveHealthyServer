<?php

namespace App\Http\Controllers;

use App\Models\ServingQuantity;
use Illuminate\Http\Request;

class ServingQuantityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServingQuantity::All(['id','name']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServingQuantity  $servingQuantity
     * @return \Illuminate\Http\Response
     */
    public function show(ServingQuantity $servingQuantity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServingQuantity  $servingQuantity
     * @return \Illuminate\Http\Response
     */
    public function edit(ServingQuantity $servingQuantity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServingQuantity  $servingQuantity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServingQuantity $servingQuantity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServingQuantity  $servingQuantity
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServingQuantity $servingQuantity)
    {
        //
    }
}
