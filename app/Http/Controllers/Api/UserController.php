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
                    "success" => false
                ));
            }
        }
        catch(Exception $e){
            DB::rollback();
            return response()->json(array(
                "success" => false,
                "reason" => $e->getMessage()
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
                    'token' => $token
                ]);
            }
            else{
                return response()->json([
                    'success' => false,
                    'reason' => 'username atau password salah'
                ]);
            }
        }
        catch(Exception $e){
            return response()->json(array(
                "success" => false,
                "reason" => $e->getMessage()
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
    $user=$this->getCurrentUser($request);
    if(!$user){
        return response()->json([
            'success' => false,
            'message' => 'User is not found'
        ]);
    }
   
    unset($data['token']);

    $updatedUser = User::where('id', $user->id)->update($data);
    $user =  User::find($user->id);

    return response()->json([
        'success' => true, 
        'message' => 'Information has been updated successfully!',
        'user' =>$user
    ]);
}



}


