<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\User;
use App\Wisatawan;
use Exception;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
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
                $data_wisatawan->alamat = '-';
                $data_wisatawan->telpon = '-';
                $data_wisatawan->foto = '';
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
                'status' => false,
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
        $u->api_token = null;
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

    public function currentUser()
    {
        $user = Auth::guard('api')->user();

        $u = new UserResource($user);

        return response()->json([
            'error' => [],
            'status' => true,
            'data' => $u,
            'message' => 'data user wisatawan',
        ]);
    }

    public function updateUser(Request $request)
    {
        $u = Auth::guard('api')->user();
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $u->id,
            'phone' => 'required|numeric|unique:wisatawan,telpon,' . $u->wisatawan->id,
        ];

        $messages = [
            'name.required' => 'Nama wajib terisi!',
            'email.required' => 'Alamat email tidak boleh kosong!',
            'email.email' => 'Format alamat email salah!',
            'email.unique' => 'Alamat email sudah digunakan!',
            'phone.required' => 'No Telepon tidak boleh kosong!',
            'phone.numeric' => 'Format no Telepon salah!',
            'phone.unique' => 'No Telepon sudah digunakan!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'data' => '',
                'message' => $validator->errors()->first(),
            ]);
        }

        $u->name = $request->name;
        $u->email = $request->email;
        $u->save();
        if ($u) {
            $w = Wisatawan::where('user_id', $u->id)->first();
            $w->tanggal_lahir = date('Y-m-d', strtotime($request->born));
            $w->alamat = $request->address;
            $w->telpon = $request->phone;
            $w->save();

            return response()->json([
                'error' => [],
                'status' => true,
                'data' => new UserResource($u),
                'message' => 'Berhasil perbaruhi!',
            ]);
        }
    }

    public function updatePhoto(Request $request)
    {
        $file = $request->image;

        $file = str_replace('data:image/png;base64,', '', $file);
        $file = str_replace(' ', '+', $file);
        $file = base64_decode($file);
        $imageName = time() . '.png';

        $destinationPath = 'fotowisatawan';

        File::exists('fotowisatawan') or File::makeDirectory('fotowisatawan');
        File::exists($destinationPath) or File::makeDirectory($destinationPath);
        file_put_contents($destinationPath . '/' . $imageName, $file);

        $user = Auth::guard('api')->user();
        if ($user->wisatawan->foto != '') {
            $this->delete_image('fotowisatawan', $user->wisatawan->foto);
        }
        $w = Wisatawan::where('user_id', $user->id)->first();
        $w->foto = $imageName;
        $w->save();
        if ($w) {
            return response()->json(
                [
                    'errors' => [],
                    'data' => $w->user,
                    'status' => true,
                    'message' => 'Anda berhasil ganti photo!',
                ]
            );
        }
    }
}
