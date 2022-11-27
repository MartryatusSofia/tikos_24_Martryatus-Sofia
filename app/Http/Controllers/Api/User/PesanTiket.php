<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Transaksi;
use App\Models\Konser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesanTiket extends Controller
{
    public function index()
    {
       $order = Transaksi::all();

       return response()->json([
        'message' => 'Data Konser Berhasil Ditampilkan',
        'data'=>$order,
       ], 200);
    }

    
    public function store(Request $request)
    {
        $user = auth()->user();
        $konser = Konser::find($request->konsers_id);

        if($user->role == 'user'){
           
            $order = Transaksi::create([
                'konsers_id'=>$request->konsers_id,
                'users_id'=>$user->id,
                'nama'=>$request->nama,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
                'jumlah_tiket'=>$request->jumlah_tiket,
                'total_harga'=>$request->jumlah_tiket * $konser->harga,
                'status'=>'pending'
            ]);

            return response()->json([
                'status'=> 'success',
                'message'=>'Order berhasil ditambahkan',
                'data'=> $order,
            ], 200);

        } else {
            return response()->json([
                'status'=> 'error',
                'message'=>'Anda bukan user',
            ],404);
        }
    }
}
