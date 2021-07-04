<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Helper\CrudHelper;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\LoginController;

class RegistrationController extends Controller
{

    public function __construct()
    {
        $this->crudhelper = new CrudHelper(
            new User,
            [],
            'user'
        );
        $this->userLoginController = new LoginController;
    }

    public function registration(Request $request)
    {
        $request_data = $request;
        $request = $request->all();
        if(array_key_exists("password",$request)){
            $request['password'] =  Hash::make($request['password']);
        }

        $registered_user_json_data = $this->crudhelper->store(
            new Request($request),
            new UserRequest($request)
        );

        if(!$registered_user_json_data->getData(true)['validation']){
            return $registered_user_json_data;
        }

        return $this->userLoginController->login($request_data);

    }
}
