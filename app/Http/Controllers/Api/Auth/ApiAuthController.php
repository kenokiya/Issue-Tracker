<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'password' => 'required|string|min:8',
            'confirmation' => 'required|string|required with:password|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->errors(),
            ]);
        } else {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);



            $token = $user->createToken($user->username . '_Token', [''])->plainTextToken;
            return response()->json([
                'status' => 200,
                'username' => $user->username,
                'token' => $token,
                'message' => 'Registered successfully',
            ]);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->errors(),
            ]);
        } else {
            $user = User::where('username', $request->username)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => 401,
                    'message' => 'invalid Credentials',
                ]);
            } else {
                if ($user->role_as == 1) {
                    $role = 'admin';
                    $token = $user->createToken($user->username . '_AdminToken', ['server:admin'])->plainTextToken;
                } else {
                    $role = '';
                    $token = $user->createToken($user->username . '_Token', [''])->plainTextToken;
                }



                return response()->json([
                    'status' => 200,
                    'username' =>  $user->username,
                    'token' => $token,
                    'message' => 'Logged in successfully',
                    'role' => $role
                ]);
            }
        }
    }

    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json([
            'status' => 200,
            'message' => 'Logged Out Successfully',
        ]);
    }

    //Password reset functions
    // public function forgortPassword(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email|max:191',
    //     ]);


    //     if ($validator->fails()) {
    //         return response()->json([
    //             'validation_errors' => $validator->errors(),
    //         ]);
    //     } else {

    //         $status = Password::sendResetLink(
    //             $request->only('email')
    //         );

    //         return $status === Password::RESET_LINK_SENT
    //             ? response()->json([
    //                 'status' => $status
    //             ])
    //             : back()->withErrors(['email' => __($status)]);
    //     }
    // }


    // public function resetPassword(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'token' => 'required',
    //         'email' => 'required|email|max:191',
    //         'password' => 'required|string|min:8',
    //         'confirmation' => 'required|string|required with:password|same:password'
    //     ]);


    //     if ($validator->fails()) {
    //         return response()->json([
    //             'validation_errors' => $validator->errors(),
    //         ]);
    //     } else {
    //         $status = Password::reset(
    //             $request->only('email', 'password', 'password_confirmation', 'token'),
    //             function ($user, $password) {
    //                 $user->forceFill([
    //                     'password' => Hash::make($password)
    //                 ])->setRememberToken(Str::random(60));

    //                 $user->save();

    //                 event(new PasswordReset($user));
    //             }
    //         );

    //         return $status === Password::PASSWORD_RESET
    //             ? response()->json([
    //                 'status' => $status
    //             ])
    //             : back()->withErrors(['email' => [__($status)]]);
    //     }
    // }
}
