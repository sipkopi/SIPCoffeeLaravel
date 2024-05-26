<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Api\Pere;

class PereApi extends Controller
{

    public function __construct(){
        $this ->Pere = new Pere();
    }


    // tampil all data
    public function index(){

        $alldata = [
            'Data Lahan'=>$this->Pere->alldata(),
        ];
        return response()->json($alldata);
    }
    
        // tampil by kode
    public function show($kode_peremajaan){

        $dataLahan = [
            $this->Pere->editdata($kode_peremajaan),
        ];
        if (!$dataLahan) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }
        return response()->json($dataLahan);
    }

            // tampil by kode lahan
    public function showperelahan($kode_lahan){

        $dataLahan = [
            $this->Pere->perelahan($kode_lahan),
        ];
        if (!$dataLahan) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }
        return response()->json($dataLahan);
    }



    public function store(Request $request){
        try {
            // Membuat kode lahan secara otomatis
            $lastKodeLahan = Pere::max('kode_peremajaan');
            $newKodeLahan = 'KPR' . str_pad((int) substr($lastKodeLahan, 3) + 1, 4, '0', STR_PAD_LEFT);
    
            // Simpan data dengan kode lahan yang sudah dibuat
            $Pere = new Pere(); // Buat instance dari model Lahan
            $Pere->kode_peremajaan = $newKodeLahan;
            $Pere->kode_lahan = $request->input('kode_lahan');
            $Pere->perlakuan = $request->input('perlakuan');
            $Pere->tanggal = $request->input('tanggal');
            $Pere->kebutuhan = $request->input('kebutuhan');
            $Pere->pupuk = $request->input('pupuk');
            $Pere->save(); // Simpan entri ke dalam tabel Lahan
    
            // Berikan respons success bersama data yang baru dibuat
            return response()->json(['message' => 'Data Lahan berhasil ditambah', 'data' => $Pere], Response::HTTP_CREATED);
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
    public function destroy($kode_peremajaan){
        $datapere = Pere::where('kode_peremajaan', $kode_peremajaan)->first();
        if (!$datapere) {
            return response()->json(['message' => 'Data Peremajaan Tidak Ada'], 404);
        }

        $datapere->delete();

        return response()->json(['message' => 'Data Peremajaan Terhapus']);
    }

    // hapus data by lahan
    // public function hapuslahan($kode_lahan){
    //     $datapere = Pere::where('kode_lahan', $kode_lahan)->first();
    //     if (!$datapere) {
    //         return response()->json(['message' => 'Data Lahan not found'], 404);
    //     }

    //     $datapere->delete();

    //     return response()->json(['message' => 'Data Lahan deleted']);
    // }
}
