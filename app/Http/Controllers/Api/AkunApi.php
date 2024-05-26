<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Api\Akun;


class AkunApi extends Controller
{

    public function __construct(){
        $this ->Akun = new Akun();
    }

    public function index(){
        $alldata = [
            'Data Akun'=>$this->Akun->datadb(),
        ];
        return response()->json($alldata);
    }

    public function showuser($user){

        $datauser = [
            $this->Akun->byuser($user),
        ];
        if (!$datauser) {
            return response()->json(['message' => 'Data User not found'], 404);
        }
        return response()->json($datauser);
    }

    public function showemail($email){

        $dataemail = [
            $this->Akun->byemail($email),
        ];
        if (!$dataemail) {
            return response()->json(['message' => 'Data email not found'], 404);
        }
        return response()->json($dataemail);
    }


    // tambah
    public function store(Request $request)
    {
        try {

            $gambarUrl = null;
    
            // Cek apakah ada file gambar yang diunggah
            if (request()->hasFile('gambar')) {
                $gambar = request()->file('gambar'); // Mengambil file gambar dari request
                $ekstensi = $gambar->getClientOriginalExtension();
                // Membuat nama file yang unik dengan menambahkan tanggal saat ini (tahun-bulan-hari)
                $namaGambar = date('Ymd') . '_' . uniqid() . '.' . $ekstensi;
                $gambar->move(public_path('dataprofile/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan
                $gambarUrl = asset('dataprofile/' . $namaGambar); // Menghasilkan URL gambar
            }
    
            // Melanjutkan dengan menyimpan data pengguna
            $Akun = new Akun();
            $Akun->user = $request->input('user');
            $Akun->nama = $request->input('nama');
            $Akun->email = $request->input('email');
            $Akun->nohp = $request->input('nohp');
            $Akun->pass = $request->input('pass');
            $Akun->lokasi = $request->input('lokasi');
            $Akun->level = "Petani"; // Set level secara otomatis
            $Akun->tanggal_create = now();
            $Akun->gambar = $gambarUrl;
            $Akun->save();
    
            return response()->json(['message' => 'Data Pengguna berhasil ditambah', 'data' => $Akun], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan data pengguna: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    // edit
    public function update(Request $request, $user)
    {
        try {
            // Temukan data pengguna berdasarkan user
            $akun = Akun::where('user', $user)->first();
    
            // Simpan path gambar lama untuk nantinya dihapus (jika ada)
            $gambarLamaPath = public_path('dataprofile/' . basename($akun->gambar));
    
            // Periksa apakah ada gambar baru yang diunggah
            if ($request->hasFile('gambar')) {
                // Jika ada, hapus gambar lama jika ada
                if (file_exists($gambarLamaPath)) {
                    unlink($gambarLamaPath); // Hapus file gambar lama
                }
    
                // Menghasilkan nama unik untuk gambar baru
                $namaGambarBaru = time() . '_' . Str::random(10) . '.' . $request->file('gambar')->getClientOriginalExtension();
    
                // Menyimpan gambar baru ke dalam folder dataprofile
                $request->file('gambar')->move(public_path('dataprofile'), $namaGambarBaru);
    
                // Simpan path gambar baru
                $akun->gambar = asset('dataprofile/' . $namaGambarBaru);
            }
    
            // Update data pengguna dengan data yang diterima dari request
            $akun->nama = $request->input('nama');
            $akun->email = $request->input('email');
            $akun->nohp = $request->input('nohp');
            $akun->pass = $request->input('pass');
            $akun->lokasi = $request->input('lokasi');
            $akun->save();
    
            return response()->json(['message' => 'Data Pengguna berhasil diupdate', 'data' => $akun], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengupdate data pengguna: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    


    // hapus
    public function delete($user){
    try {
        // Temukan data pengguna berdasarkan ID
        $Akun = Akun::findOrFail($user);

        // Hapus gambar dari folder dataprofile
        $gambarPath = public_path('dataprofile/' . basename($Akun->gambar));
        if (file_exists($gambarPath)) {
            unlink($gambarPath); // Hapus file gambar jika ada
        }

        // Hapus data pengguna dari database
        $Akun->delete();

        return response()->json(['message' => 'Data Pengguna berhasil dihapus'], Response::HTTP_OK);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Gagal menghapus data pengguna tidak ada: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
    


}