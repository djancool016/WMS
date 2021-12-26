<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::select('barang.*',DB::raw("CONCAT(jenis_barang.kode,RIGHT(CONCAT('0000', barang.id), 4)) AS kode_barang"),'jenis','suppliers.nama as suplier')
        ->join('jenis_barang','jenis_barang.id','=','barang.jenis_barang_id')
        ->join('suppliers','suppliers.id','=','barang.suplier_id')
        ->get();

        $jenis_barang = DB::table('jenis_barang')
        ->select('jenis_barang.*')
        ->orderBy('jenis', 'asc')
        ->get();

        $suplier = DB::table('suppliers')
        ->select('suppliers.*')
        ->orderBy('nama', 'asc')
        ->get();

        return view ('barang', compact('barang','jenis_barang','suplier'));
        //return compact('barang','jenis_barang');
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
        $barang = new Barang;
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->stock = $request->stock;
        $barang->deskripsi = $request->deskripsi;
        $barang->jenis_barang_id = $request->jenis_barang_id;
        $barang->suplier_id = $request->suplier_id;
        $barang->save();

        return redirect ('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $barang = Barang::find($request->id);
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->stock = $request->stock;
        $barang->deskripsi = $request->deskripsi;
        $barang->jenis_barang_id = $request->jenis_barang_id;
        $barang->suplier_id = $request->suplier_id;
        $barang->save();

        return redirect ('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $barang = Barang::find($request->id);
        $barang->delete();

        return redirect ('/barang');
    }
}
