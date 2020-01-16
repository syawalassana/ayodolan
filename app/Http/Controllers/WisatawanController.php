<?php

namespace App\Http\Controllers;

use App\User;
use App\Wisatawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WisatawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items=[
          'data'=>Wisatawan::with('user')->paginate()
      ];
      return view ('wisatawan.wisatawan', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wisatawan.wisatawan_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $messages = [
            'required' => ':attribute Tidak Boleh Kosong',
            'numeric' => ':attribute harus angka',

        ];
        $validator = Validator::make($request->all(),[
        'nama_wisatawan'=> 'required',
        'tanggal_lahir'=> 'required',
        'alamat'=> 'required',
        'foto' => 'required',
        'telpon'=> 'required',
        ],$messages
    );
    if($validator->fails()){
     return redirect('/wisatawan/create')
                ->withErrors($validator)
                ->withInput();

    }
    
    $users=new User();
    $users->name=$request->nama_wisatawan;
    $users->email=$request->email;
    $users->password=bcrypt('ayodolan');
    $users->role_id=2;
    $users->save();
    if($users){
    //masuk table wisatawan
        $data_wisatawan = new Wisatawan;
        $data_wisatawan->user_id=$users->id;
        $data_wisatawan->tanggal_lahir=$request->tanggal_lahir;
        $data_wisatawan->alamat=$request->alamat;
        $foto=$request->file('foto');
        $nama_foto = time()."_".$foto->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'fotowisatawan';
        $foto->move($tujuan_upload,$nama_foto);
        $data_wisatawan->foto = $nama_foto;
        $data_wisatawan->telpon =$request->telpon;
        $data_wisatawan->save();   
    }
    //^masuk table users
    if($data_wisatawan){
        return redirect('/wisatawan');
    }
    $data_wisatawan->telpon=$request->telpon;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function show(Wisatawan $wisatawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisatawan $wisatawan)
    {
        $items=[
            'data'=>$wisatawan
        ];
        return view ('wisatawan.wisatawan_edit', $items);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $messages = [
                'required' => ':attribute Tidak Boleh Kosong',
                'numeric' => ':attribute harus angka',
    
            ];
            $validator = Validator::make($request->all(),[
            'nama_wisatawan'=> 'required',
            'tanggal_lahir'=> 'required',
            'alamat'=> 'required',
            'foto' => 'required',
            'telpon'=> 'required',
            ],$messages
        );
        if($validator->fails()){
            return redirect('wisatawan/'.$id.'/edit')
                    ->withErrors('$validator')
                    ->withInput();
        }
        $data_wisatawan=Wisatawan::find($id);
        $users=User::find($data_wisatawan->user_id);
        $users->name=$request->nama_wisatawan;
        $users->email=$request->email;
        $users->password=bcrypt('ayodolan');
        $users->role_id=2;
        $users->save();
        if($users){
        //masuk table wisatawan
            $data_wisatawan->user_id=$users->id;
            $data_wisatawan->tanggal_lahir=$request->tanggal_lahir;
            $data_wisatawan->alamat=$request->alamat;
            if($request->has('foto')){
                $foto = $request->file('foto');
                $nama_foto = time()."_".$foto->getClientOriginalName();
                  // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'wisatawan';
                $foto->move($tujuan_upload,$nama_foto);
                if(file_exists('wisatawan/'.$data_wisatawan->foto)){
                    //skrip untuk menghapus data foto lama yang di update
                unlink('wisatawan/'.$data_wisatawan->foto);    
                }
                $data_wisatawan->foto=$nama_foto;                
            $data_wisatawan->deskripsi = $request->deskripsi;
            $data_wisatawan->save();   


            
            }
        }
        //^masuk table users
        if($data_wisatawan){
            return redirect('/wisatwan');
        }
        $data_wisatawan->telpon=$request->telpon;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisatawan = Wisatawan::find($id);
        $user_id= $wisatawan->user_id;
        $wisatawan->delete();
        $user=User::find($user_id);
        $user->delete();
        return redirect("/wisatawan");

    }
}
