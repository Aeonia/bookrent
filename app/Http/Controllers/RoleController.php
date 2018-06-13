<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Author;
use App\AuthorBook;
use Illuminate\Support\Facades\Auth;
use AuthorController;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles= Auth::user()->roles;
        return view('index', compact('roles'));
    }

    public function create()
    {
        $user= Auth::user();
        $roles= Role::all();
        return view('attachRole', compact('roles')); 
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attachRole(Role $role, User $user, Request $request)
    {
        $user= Auth::user();
        $roles= Role::all();
        $user->roles()->attach($request->role);
        //$book->saveBook($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
