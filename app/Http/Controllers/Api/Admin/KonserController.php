<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konser;
use Illuminate\Http\Request;

class KonserController extends Controller
{
    
    public function index()
    {
       $konser = Konser::all();

       return response()->json([
        'message' => 'Data Konser Berhasil Ditampilkan',
        'data'=>$konser,
       ], 200);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if($user->role == 'admin'){
            $request->validate([
                'gambar' => 'required',
                'nama'=>'required',
                'tanggal'=>'required',
                'tempat'=>'required',
                'harga'=>'required',
                'deskripsi'=>'required',

            ]);

            $konser = Konser::create([
                'gambar'=>$request->gambar,
                'nama'=>$request->nama,
                'tanggal'=>$request->tanggal,
                'tempat'=>$request->tempat,
                'harga'=>$request->harga,
                'deskripsi'=>$request->deskripsi,
            ]);

            return response()->json([
                'status'=> 'success',
                'message'=>'Konser berhasil ditambahkan',
                'data'=> $konser,
            ], 200);

        } else {
            return response()->json([
                'status'=> 'error',
                'message'=>'Anda tidak memiliki akses untuk menambahkan konser',
            ],404);
        }
    }

    public function show($id)
    {
    $user = auth()->user();
        
            $konser = Konser::find($id);
            return response()->json([
                'message' => 'Data Konser Berhasil Ditampilkan',
                'data'=>$konser,
               ], 200);
            }
    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if($user->role == 'admin'){
            $request->validate([
                'nama'=>'required',
                'tanggal'=>'required',
                'tempat'=>'required',
                'harga'=>'required',
                'deskripsi'=>'required',

            ]);

            $konser = Konser::find($id);

            $konser -> update([
                'nama'=>$request->nama,
                'tanggal'=>$request->tanggal,
                'tempat'=>$request->tempat,
                'harga'=>$request->harga,
                'deskripsi'=>$request->deskripsi,
            ]);

            return response()->json([
                'status'=> 'success',
                'message'=>'Konser berhasil diupdate',
                'data'=> $konser,
            ], 200);

        } else {
            return response()->json([
                'status'=> 'error',
                'message'=>'Anda tidak memiliki akses untuk mengupdate konser',
            ],404);
        }
    }

    public function destroy($id)
    {
        $user = auth()->user();
        if($user->role == 'admin'){
            $konser = Konser::find($id);

            $konser -> delete();

            return response()->json([
                'status'=> 'success',
                'message'=>'Konser berhasil dihapus',

            ], 200);

        } else {
            return response()->json([
                'status'=> 'error',
                'message'=>'Anda tidak memiliki akses untuk menghapus konser',
            ],404);
        }
    }
}

