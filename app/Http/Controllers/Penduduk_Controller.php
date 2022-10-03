<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class Penduduk_Controller extends Controller
{

    public function index()
    {
        return response()->json([
            'token' => csrf_token()
        ]);
    }
    public function warga()
    {
        return view('menu/warga');
        // dd(Auth::user()->id);
    }


    public function post_warga(Request $req)
    {
        $data_warga = Validator::make($req->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'desa' => 'required',
        ]);

        // try {
        if ($data_warga->failed()) {

            return response()->json([
                'status' => 400,
                'error' => $data_warga->messages()
            ]);
        } else {
            $warga = new DataPenduduk();

            // ##### USE INPUT METHOD########
            // $warga->nama = $req->input('nama');
            // $warga->nik = $req->input('nik');
            // $warga->alamat = $req->input('alamat');
            // $warga->status = $req->input('status');
            // $warga->desa = $req->input('desa');

            // ##### USE AJAX POST ########
            $warga->nama = $req->post('nama');
            $warga->nik = $req->post('nik');
            $warga->alamat = $req->post('alamat');
            $warga->status = $req->post('status');
            $warga->desa = $req->post('desa');


            //###### USE FOR SAVE DATA##############
            $warga->save();
        }
        return response();
        // } catch (\Throwable $th) {
        //     return back()->with('Error', 'Terjadi Kesalahan');
        //     //throw $th;
        // }


        // return response()->header('Content-Type', 'application/json;charset=UTF-8')->json([

        // ]);
    }


    public function search(Request $req)
    {
        $search = $req->input('search');

        $member = DataPenduduk::where('nama', 'like', "%search%")
            ->orWhere('nama', 'like', "%search%");
        return response($member);
    }

    public function store()
    {
        //
    }


    public function show()
    {

        $data = DataPenduduk::all();

        return response($data);


        // return view('layout/component/input');
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
