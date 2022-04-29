<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {

        $result = [];
        $fields = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|string'
        ]);

        $user = self::validateEmail($fields['email']);

        if( !$user || !Hash::check($fields['password'], $user->password) ) {
            $result = [
                'message'   => 'Credentials do not match on our record.',
                'status'    => 401,
            ];
        } else {

            $token = $user->createToken( env('APP_TOKEN', 'wenman') )->plainTextToken;

            $result = [
                'user' => $user,
                'token' => $token,
                'status' => 201
            ];
            
        }

        return response()->json($result, $result['status']);
                
    }

    public function register(Request $request) {

        $fields = $request->validate([
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|string|confirmed',
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'mobile'        => 'nullable'
        ]);

        $user = User::create([
            'email'     => $fields['email'],
            'password'  => bcrypt($fields['password'])
        ]);

        foreach( $request->except( ['email', 'password', 'password_confirmation'] ) AS $key => $data ) :
            UserMeta::create([
                'user_id' => $user->id,
                'meta_key' => $key,
                'meta_value' => $data,
            ]);
        endforeach;

        //TODO: Send email verification

        $token = $user->createToken(env('APP_TOKEN', 'wenman'))->plainTextToken;

        return response()->json([
            'user'  => $user->meta,
            'token' => $token
        ], 200);
        
    }

    private function validateEmail($email) {
        return User::where('email', $email)->first();
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have been logged out successfully!',
        ];
        
    }
}
