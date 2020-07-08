<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Wisatawan;
use Exception;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController
{
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];

        $messages = [
            'name.required' => 'Nama harus di isi',
            'email.required' => 'Alamat email tidak boleh kosong!',
            'email.email' => 'Format alamat email salah!',
            'email.unique' => 'Alamat email sudah digunakan!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password minimal 6 karakter',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'data' => '',
                'message' => $validator->errors()->first(),
            ]);
        }

        try {
            DB::beginTransaction();
            $users = new User;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->role_id = 2;
            $users->api_token = str_random(60);
            $users->save();

            if ($users) {
                //masuk table wisatawan
                $data_wisatawan = new Wisatawan;
                $data_wisatawan->user_id = $users->id;
                $data_wisatawan->save();

                DB::commit();

                return response()->json([
                    'status' => true,
                    'data' => $users,
                    'message' => 'Registrasi berhasil!',
                ]);
            }

            DB::rollback();

            return response()->json([
                'status' => false,
                'data' => '',
                'message' => 'Registrasi gagal!',
            ]);
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'data' => '',
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function login(Request $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                $user = Auth::user();
                $user->api_token = Hash::make(uniqid(null, true));
                $user->save();
                if ($user) {
                    return response()->json([
                        'status' => true,
                        'data' => $user,
                        'message' => 'Berhasil masuk!',
                    ]);
                }
            }

            return response()->json([
                'status' => false,
                'data' => '',
                'message' => 'Gagal masuk!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'data' => '',
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function logout()
    {
        $u = Auth::guard('api')->user();
        $u->api_token = '';
        $u->save();

        return response()->json([
            'status' => true,
            'data' => '',
            'message' => 'Berhasil keluar!',
        ]);
    }

    public function getCurrentUser()
    {
        $u = Auth::guard('api')->user();

        return $u;
    }
}
