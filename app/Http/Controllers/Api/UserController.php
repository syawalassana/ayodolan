<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Wisatawan;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mail;
use App\Mail\PasswordReset;
use Exception;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function register(Request $request){

        try{
            DB::beginTransaction();
            $users=new User;
            $users->name=$request->input('nama');
            $users->email=$request->input('email');
            $users->password=Hash::make($request->input('password'));
            $users->role_id=2;
            $users->save();

            if($users){
                //masuk table wisatawan
                $data_wisatawan = new Wisatawan;
                $data_wisatawan->user_id=$users->id;
                $data_wisatawan->tanggal_lahir=$request->input('tgl_lahir');
                $data_wisatawan->alamat=$request->input('alamat');
                $data_wisatawan->telpon=$request->input('no_telp');
                $data_wisatawan->save();  
                
                DB::commit();
                return response()->json(array(
                    "success" => true 

                ));
            } 
            else{
                DB::rollback();
                return response()->json(array(
                    "success" => false,
                    "reason" => "kesalahan sistem"
                ));
            }
        }
        catch(Exception $e){
            DB::rollback();
            return response()->json(array(
                "success" => false,
                "reason" => "kesalahan sistem"
            ));
        }
    }
    public function login(Request $request)
    {
        try{
            $email = $request->input('email');
            $password = $request->input('password');
            $token = Hash::make(uniqid(null, true));
    
            $data = User::where('email', '=', $email)
                ->first();
            if(Hash::check($password, $data->password)){
                return response()->json([
                    'success' => true,
                    'id' => $data->id,
                    'token' => $token
                ]);
            }
            else{
                return response()->json([
                    'success' => false,
                    'reason' => 'email atau password salah'
                ]);
            }
        }
        catch(Exception $e){
            return response()->json(array(
                "success" => false,
                "reason" => 'email atau password salah'
            ));
        }
    }
    public function logout(Request $request)
    {
        if(!User::checkToken($request)){
            return response()->json([
             'message' => 'Token is required',
             'success' => false,
            ],422);
        }
        
        try {
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function getCurrentUser(Request $request){
       if(!User::checkToken($request)){
           return response()->json([
            'message' => 'Token is required'
           ],422);
       }
        
        $user = JWTAuth::parseToken()->authenticate();
       // add isProfileUpdated....
       $isProfileUpdated=false;
        if($user->isPicUpdated==1 && $user->isEmailUpdated){
            $isProfileUpdated=true;
            
        }
        $user->isProfileUpdated=$isProfileUpdated;

        return $user;
}

   
public function update(Request $request){
    // nama:
    // email:
    // password:
    // tgl_lahir:
    // alamat:
    // foto:

    try{
        DB::beginTransaction();
        if(!$request->filled('id')){
            return response()->json([
                'success' => false,
                'message' => 'Id harus diisi'
            ]);
        }
    
        $users = User::find($request->id);
        if(!$users){
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan'
            ]);
        }

        if($request->filled('nama')){
            $users->name = $request->nama;
        }
        if($request->filled('email')){
            $users->email = $request->email;
        }
        if($request->filled('password')){
            $users->password = Hash::make($request->password);
        }
        $users->save();

        if(!$users){
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan'
            ]);
        }

        $data_wisatawan = Wisatawan::where('user_id', '=', $users->id)->first();
        //masuk table wisatawan
 
        if($request->filled('tanggal_lahir')){
            $data_wisatawan->tanggal_lahir=$request->tanggal_lahir;
        }
        if($request->filled('password')){
            $data_wisatawan->alamat=$request->alamat;
        }

        if($request->has('foto')){
            $foto = $request->file('foto');
            $nama_foto = time()."_".$foto->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'fotowisatawan';
            $foto->move($tujuan_upload,$nama_foto);
            if(file_exists('wisatawan/'.$data_wisatawan->foto)){
                //skrip untuk menghapus data foto lama yang di update
                unlink('wisatawan/'.$data_wisatawan->foto);    
            }
            $data_wisatawan->foto=$nama_foto;
        }

        if($request->filled('telpon')){
            $data_wisatawan->telpon=$request->telpon;                
        }
        $data_wisatawan->save(); 

        DB::commit();
        return response()->json([
            'success' => true,
            'message' => 'Sukses update data'
        ]);

    }
    catch(Exception $e){
        DB::rollback();
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }

}

}


