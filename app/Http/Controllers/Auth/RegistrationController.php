<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Helper\CrudHelper;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    public function __construct()
    {
        $this->crudhelper = new CrudHelper(
            new User,
            [],
            'user'
        );
    }

    public function registration(Request $request)
    {
        $request = $request->all();
        if(array_key_exists("password",$request)){
            $request['password'] =  Hash::make($request['password']);
        }

        return $this->crudhelper->store(
            new Request($request),
            new UserRequest($request)
        );
    }
}
