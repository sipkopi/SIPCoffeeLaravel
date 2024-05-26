<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Api\Lahan;

class LahanApi extends Controller
{

    public function __construct(){
        $this ->Lahan = new Lahan();
    }


    // tampil all data
    public function index(){

        $alldata = [
            'Data Lahan'=>$this->Lahan->alldata(),
        ];
        return response()->json($alldata);
    }
    
        // tampil by kode
    public function show($kode_lahan){

        $dataLahan = [
            $this->Lahan->editdata($kode_lahan),
        ];
        if (!$dataLahan) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }
        return response()->json($dataLahan);
    }

            // tampil by kode
    public function showuser($user){

        $dataLahan = [
            $this->Lahan->lahanuser($user),
        ];
        if (!$dataLahan) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }
        return response()->json($dataLahan);
    }



    public function store(Request $request){
        try {
            // Membuat kode lahan secara otomatis
            $lastKodeLahan = Lahan::max('kode_lahan');
            $newKodeLahan = 'KL' . str_pad((int) substr($lastKodeLahan, 2) + 1, 4, '0', STR_PAD_LEFT);
    
            // Simpan data dengan kode lahan yang sudah dibuat
            $Lahan = new Lahan(); // Buat instance dari model Lahan
            $Lahan->kode_lahan = $newKodeLahan;
            $Lahan->user = $request->input('user');
            $Lahan->varietas_pohon = $request->input('varietas_pohon');
            $Lahan->total_bibit = $request->input('total_bibit');
            $Lahan->luas_lahan = $request->input('luas_lahan');
            $Lahan->tanggal = $request->input('tanggal'); 
            $Lahan->ketinggian_tanam = $request->input('ketinggian_tanam'); 
            $Lahan->lokasi_lahan = $request->input('lokasi_lahan'); 
            $Lahan->longtitude = $request->input('longtitude');
            $Lahan->latitude = $request->input('latitude');
            $Lahan->save(); // Simpan entri ke dalam tabel Lahan
    
            // Berikan respons success bersama data yang baru dibuat
            return response()->json(['message' => 'Data Lahan berhasil ditambah', 'data' => $Lahan], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            // Tangani error jika terjadi
            $statusCode = $e instanceof \Illuminate\Database\QueryException ? Response::HTTP_BAD_REQUEST : Response::HTTP_INTERNAL_SERVER_ERROR;
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], $statusCode);
        }
    }


    public function updatee(Request $request, $kode_lahan)
    {
        try {
            $lahan = Lahan::where('kode_lahan', $kode_lahan)->firstOrFail();
            
            $lahan->user = $request->input('user');
            $lahan->varietas_pohon = $request->input('varietas_pohon');
            $lahan->total_bibit = $request->input('total_bibit');
            $lahan->luas_lahan = $request->input('luas_lahan');
            $lahan->tanggal = $request->input('tanggal'); 
            $lahan->ketinggian_tanam = $request->input('ketinggian_tanam'); 
            $lahan->lokasi_lahan = $request->input('lokasi_lahan'); 
            $lahan->longtitude = $request->input('longtitude');
            $lahan->latitude = $request->input('latitude');
            $lahan->save();

            return response()->json(['message' => 'Data Lahan berhasil diupdate', 'data' => $lahan], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengupdate data: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    // hapus data 
    public function destroy($kode_lahan){
        $dataLahan = Lahan::where('kode_lahan', $kode_lahan)->first();
        if (!$dataLahan) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }

        $dataLahan->delete();

        return response()->json(['message' => 'Data Lahan deleted']);
    }
}
