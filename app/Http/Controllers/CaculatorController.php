<?php

namespace App\Http\Controllers;

use App\Caculator;
use Illuminate\Http\Request;

class CaculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 1;
        return view('caculator');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 2;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 3;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\caculator  $caculator
     * @return \Illuminate\Http\Response
     */
    public function show(caculator $caculator)
    {
        echo 4;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\caculator  $caculator
     * @return \Illuminate\Http\Response
     */
    public function edit(caculator $caculator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\caculator  $caculator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, caculator $caculator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\caculator  $caculator
     * @return \Illuminate\Http\Response
     */
    public function destroy(caculator $caculator)
    {
        //
    }
}
