<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = Status::get();

        if($request->route()->getPrefix() === 'api'){
            return compact('status');
        }else{
            return view('/', compact('status'));
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
        $status = new Status;
        $status->status = $request->status;
        $status->save();

        if($request->route()->getPrefix() === 'api'){
            return "Data Berhasil Ditambahkan!!!";
        }else{
            return view('/', compact('status'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $status = Status::find($request->id);
        $status->status = $request->status;
        $status->save();

        if($request->route()->getPrefix() === 'api'){
            return "Data Berhasil Diubah!!!";
        }else{
            return view('/', compact('status'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $status = Status::find($request->id);
        $status->delete();

        if($request->route()->getPrefix() === 'api'){
            return "Data Berhasil Dihapus!!!";
        }else{
            return view('/', compact('status'));
        }
    }
}
