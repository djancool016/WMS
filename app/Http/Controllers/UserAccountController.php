<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = UserAccount::get();

        if ($request->route()->getPrefix() === 'api') {
            return compact('users');
        } else {
            return view ('user_account', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAccount  $userAccount
     * @return \Illuminate\Http\Response
     */
    public function show(UserAccount $userAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAccount  $userAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAccount $userAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAccount  $userAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $users = UserAccount::find($request->id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->alamat = $request->alamat;
        $users->telp = $request->telp;
        $users->departement_id = $request->departement_id;
        $users->save();

        if ($request->route()->getPrefix() === 'api') {
            return "Data Berhasil Diubah!!!";
        } else {
            return redirect ('/');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAccount  $userAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $users = UserAccount::find($request->id);
        // $users->delete();

        // if ($request->route()->getPrefix() === 'api') {
        //     return "Data Berhasil Diubah!!!";
        // } else {
        //     return redirect ('/');
        // }
    }
}
