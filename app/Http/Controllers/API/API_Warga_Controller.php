<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\DataPenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class API_Warga_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataPenduduk::when(request('search'), function ($query) {
            $query->where('nama', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(10);
        return ApiFormatter::create_Api(200, 'success', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {

        if ($req->id == null) {    // create
            $req->validate(
                [
                    'kk' => 'required',
                    'nik' => 'required',
                    'nama' => 'required',
                    'jenis_kelamin' => 'required',
                    'tanggal_lahir' => 'required',
                    'status' => 'required',
                ]
            );
            $warga = DataPenduduk::create([
                "kk" => intval($req->post('kk')),
                "nik" => intval($req->post('nik')),
                "nama" => $req->post('nama'),
                "jenis_kelamin" => $req->post('gender'),
                "tanggal_lahir" => $req->post('tgl_lahir'),
                "status" => $req->post('status')
            ]);

            if ($warga) {

                return ApiFormatter::create_Api(200, "success", $warga);
            } else {
                return ApiFormatter::create_Api(400, "Gagal");
            }
        } else {

            $update = DataPenduduk::find($req->id);
            $update->kk = $req->kk;
            $update->nik = $req->nik;
            $update->nama = $req->nama;
            $update->jenis_kelamin = $req->gender;
            $update->tanggal_lahir = $req->tgl_lahir;
            $update->status = $req->status;

            if ($update->save()) {

                return ApiFormatter::create_Api(200, "success", $update);
            } else {
                return ApiFormatter::create_Api(400, "Gagal");
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ApiFormatter::create_Api(200, "succes", $request)->header(
            'Access-Control-Allow-Origin',
            "*"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDataById($id)
    {
        $getting = DataPenduduk::find($id);
        if ($getting) {

            return ApiFormatter::create_Api(200, "success", $getting);
        } else {
            return ApiFormatter::create_Api(400, "Gagal");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        return response()->json($req->all());
        // $update=DataPenduduk::find($req->)

        // $update =  DataPenduduk::find($req->id)->update($req->all());
        // if ($update) {

        //     return ApiFormatter::create_Api(200, "success", $update);
        // } else {
        //     return ApiFormatter::create_Api(400, "Gagal");
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =  DataPenduduk::find($id)->delete();
        if ($delete) {

            return ApiFormatter::create_Api(200, "success", $delete);
        } else {
            return ApiFormatter::create_Api(400, "Gagal");
        }
    }
}
