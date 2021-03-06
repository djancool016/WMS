<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departement = Departement::get();

        if ($request->route()->getPrefix() === 'api') {
            return compact('departement');
        } else {
            return view ('barang', compact('departement'));
        }
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
        $departement = new Departement;
        $departement->nama = $request->nama;
        $departement->save();

        if ($request->route()->getPrefix() === 'api') {
            return "Data Berhasil Disimpan!!!";
        } else {
            return redirect ('/departement');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $departement = Departement::find($request->id);
        $departement->nama = $request->nama;
        $departement->save();

        if ($request->route()->getPrefix() === 'api') {
            return "Data Berhasil Diubah!!!";
        } else {
            return redirect ('/departement');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $departement = $departement::find($request->id);
        $departement->delete();

        if ($request->route()->getPrefix() === 'api') {
            return "Data Berhasil Dihapus!!!";
        } else {
            return redirect ('/departement');
        }
    }
}
