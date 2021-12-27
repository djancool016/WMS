<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supplier = Supplier::get(); 

        if ($request->route()->getPrefix() === 'api') {
            return compact('supplier');
        } else {
            return view ('suplier', compact('supplier'));
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
        $supplier = new Supplier;
        $supplier->nama = $request->nama;
        $supplier->email = $request->email;
        $supplier->telp = $request->telp;
        $supplier->alamat = $request->alamat;
        $supplier->save();

        if ($request->route()->getPrefix() === 'api') {
            return "Data Berhasil Disimpan!!!";
        } else {
            return redirect ('/suplier');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->nama = $request->nama;
        $supplier->email = $request->email;
        $supplier->telp = $request->telp;
        $supplier->alamat = $request->alamat;
        $supplier->save();

        if ($request->route()->getPrefix() === 'api') {
            return "Data Berhasil Diubah!!!";
        } else {
            return redirect ('/suplier');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->delete();

        if ($request->route()->getPrefix() === 'api') {
            return "Data Berhasil Dihapus!!!";
        } else {
            return redirect ('/suplier');
        }
    }
}
