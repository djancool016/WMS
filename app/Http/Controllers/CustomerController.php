<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = Customer::get();

        if ($request->route()->getPrefix() === 'api') {
            return compact('customer');
        } else {
            return view('customer', compact('customer'));
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
        $customer = new Customer;
        $customer->nama = $request->nama;
        $customer->email = $request->email;
        $customer->telp = $request->telp;
        $customer->alamat = $request->alamat;
        $customer->save();

        if ($request->route()->getPrefix() === 'api') {
            return "Data Berhasil Disimpan!!!";
        } else {
            return redirect ('/customer');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->nama = $request->nama;
        $customer->alamat = $request->alamat;
        $customer->email = $request->email;
        $customer->telp = $request->telp;
        $customer->save();

        if ($request->route()->getPrefix() === 'api') {
            return "Data Berhasil Diubah!!!";
        } else {
            return redirect ('/customer');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->delete();

        if ($request->route()->getPrefix() === 'api') {
            return "Data Berhasil Dihapus!!!";
        } else {
            return redirect ('/customer');
        }
    }
}
