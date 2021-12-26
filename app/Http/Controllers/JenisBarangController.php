<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use DB;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisBarang = JenisBarang::select('jenis','kode',DB::raw("COUNT(jenis) as jumlah_produk, SUM(barang.harga*barang.stock) as total_harga_stok"))
        ->join('barang','barang.jenis_barang_id','=','jenis_barang.id')
        ->groupBy('jenis','kode')
        ->get();

        return view ('jenisbarang', compact('jenisBarang'));
        //return $jenisBarang;
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
        $jenisBarang = new JenisBarang;
        $jenisBarang->kode = $request->kode;
        $jenisBarang->jenis = $request->jenis;
        $jenisBarang->save();

        return "Data Berhasil Ditambahkan!!!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function show(JenisBarang $jenisBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisBarang $jenisBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenisBarang = JenisBarang::find($id);
        $jenisBarang->kode = $request->kode;
        $jenisBarang->jenis = $request->jenis;
        $jenisBarang->save();

        return "Data Berhasil di Update!!!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisBarang = JenisBarang::find($id);
        $jenisBarang->delete();

        return "Data Berhasil di Hapus!!!";
    }
}