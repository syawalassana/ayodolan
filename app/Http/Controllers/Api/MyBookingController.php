<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransaksiResource;
use App\Transaksi;
use Illuminate\Support\Facades\Auth;

class MyBookingController extends Controller
{
    public function index()
    {
        $user = Auth::guard('api')->user();
        $t = Transaksi::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

        $t = TransaksiResource::collection($t);

        return response()->json([
            'status' => true,
            'data' => $t,
            'message' => 'List Booking!',
        ]);
    }

    public function cancel($id)
    {
        $user = Auth::guard('api')->user();
        $t = Transaksi::where('user_id', $user->id)->where('id', $id)->first();
        $t->status = 'batal';
        $t->save();

        if ($t) {
            $tc = new TransaksiResource($t);

            return response()->json([
                'status' => true,
                'data' => $tc,
                'message' => 'Berhasil batalkan transaksi!',
            ]);
        }
    }
}
