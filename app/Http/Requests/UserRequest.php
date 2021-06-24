<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest
{
    public $validator;
    protected $request;

    public function __construct(array $request)
    {
        $this->request = $request;
        $this->validator();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = $this->request;
        $user_id = array_key_exists('user_id',$this->request) ? $this->request['user_id'] : null;
        return  [
            'name' => 'required|max:100',
            // 'email' => 'required|email|unique:App\Models\User,email,'.$user_id,
            'email' => 'required|email:rfc,dns|unique:App\Models\User,email,'.$user_id,
            'password' => Rule::requiredIf(function () use ($request) {
                return !array_key_exists('user_id',$request);
            }),
            // 'role' => 'required',
        ];
    }


    public function message()
    {
        return  [

        ];
    }

    public function validator()
    {

        $this->validator =  $this->authorize() ? Validator::make(
                                $this->request,
                                $this->rules(),
                                $this->message()
                            ) : 'unauthorised' ;
    }

}
