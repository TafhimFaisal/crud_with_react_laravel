<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\CrudHelper;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->crudhelper = new CrudHelper(
            new User,
            [],
            'user'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if(array_key_exists("password",$request)){
            $request['password'] =  Hash::make($request['password']);
        }

        return $this->crudhelper->store(
            new Request($request),
            new UserRequest($request)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($user);
        // $user = User::find($request['user_id']);

        if(array_key_exists("role",$request)){
            $this->updateUserRole(
                $request['role'],
                $request['user_id']
            );
        }

        if(array_key_exists("password",$request)){
            $request['password'] =  Hash::make($request['password']);
        }

        return $this->crudhelper->update(
            new Request($request),
            $user,
            new UserRequest($request)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        dd($user);
        // $user = User::find($id);
        return $this->crudhelper->destroy($user);
    }
}
