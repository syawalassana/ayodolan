<?php

namespace App\Http\Controllers;

use App\Wisatawan;
use Illuminate\Http\Request;

class WisatawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items=[
          'data'=>Wisatawan::orderBy('nama_wisatawan')->paginate()
      ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wisatawan.wisatawan_tambah');
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
     * @param  \App\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function show(Wisatawan $wisatawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisatawan $wisatawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wisatawan $wisatawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisatawan $wisatawan)
    {
        //
    }
}
