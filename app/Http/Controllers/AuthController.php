<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('linkstaffApp')->plainTextToken;
            $success['name'] =  $authUser->first_name.' '.$authUser->last_name;

            return $this->sendResponse($success, 'User signed in');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('linkstaffApp')->plainTextToken;
        $success['first_name'] =  $user->first_name;
        $success['last_name'] =  $user->last_name;

        return $this->sendResponse($success, 'User created successfully.');
    }
}
