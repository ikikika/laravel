<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:255',
        ]);

        if( $validator->fails() ){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->json()->get('name'),
            'email' => $request->json()->get('email'),
            'password' => Hash::make($request->json()->get('password'))
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->json()->all();

        $validator = Validator::make($credentials, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        if( $validator->fails() ){
            return response()->json($validator->errors()->toJson(), 401);
        }

        try{
            if( !$token = JWTAuth::attempt($credentials) ){
                return response()->json( ['error'=>'invalid_credentials'], 402);
            }
        } catch( JWTException $e){
            return response()->json( ['error'=>'could_not_create_token'], 500);
        }
        return response()->json(compact('token'), 201);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getAuthenticatedUser()
    {
        try{
            if( !$user = JWTAuth::parseToken()->authenticate() ){
                return response()->json(['user_not_found'],400);
            }
        } catch( TokenExpiredException $e ) {
            return response()->json(['token_expired'], 401);
        } catch( TokenInvalidException $e ) {
            return response()->json(['token_invalid '], 400);
        } catch( JWTException $e ) {
            return response()->json(['token_absent'], 403);
        }
        return response()->json(compact('user'));
    }
}
