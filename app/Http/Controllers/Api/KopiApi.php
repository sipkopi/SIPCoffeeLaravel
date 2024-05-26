<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Str;

use App\Models\Api\Kopi;


class KopiApi extends Controller
{

    public function __construct(){
        $this ->Kopi = new Kopi();
    }

    public function index(){
        $alldata = [
            'Data Akun'=>$this->Kopi->alldata(),
        ];
        return response()->json($alldata);
    }

    public function showpere($kode_peremajaan){

        $kopipere = [
            $this->Kopi->showpere($kode_peremajaan),
        ];
        if (!$kopipere) {
            return response()->json(['message' => 'Data User not found'], 404);
        }
        return response()->json($kopipere);
    }

    public function show($kode_kopi){

        $datakopi = [
            $this->Kopi->byekode($kode_kopi),
        ];
        if (!$datakopi) {
            return response()->json(['message' => 'Data email not found'], 404);
        }
        return response()->json($datakopi);
    }

 //   https://harrk.dev/qr-code-generator-in-laravel-10-tutorial/
    // tambah
    public function store(Request $request)
    {
        try {
            $lastKodeKopi = Kopi::max('kode_kopi');
            $newKodeKopi = 'KP' . str_pad((int) substr($lastKodeKopi, 2) + 1, 4, '0', STR_PAD_LEFT);
    
            $gambarUrl = ''; 
        
            // Cek apakah ada file gambar yang diunggah
            if ($request->hasFile('gambar1')) {
                $gambar = $request->file('gambar1'); // Mengambil file gambar dari request
                $ekstensi = $gambar->getClientOriginalExtension();
                // Membuat nama file yang unik dengan menambahkan tanggal saat ini (tahun-bulan-hari)
                $namaGambar = date('Ymd') . '_' . uniqid() . '.' . $ekstensi;
                $gambar->move(public_path('gambarproduk/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan
                $gambarUrl = asset('gambarproduk/' . $namaGambar); // Menghasilkan URL gambar
            }
    

            // Generate QR code
            // $qr = QrCode::size(300)->margin(10)->generate('sipkopi.com/produk/' . $newKodeKopi);

            // // Simpan QR code sebagai gambar
            // $namaGambarQR = time() . '_' . $newKodeKopi . '.png'; // Nama gambar QR
            // $pathGambarQR = public_path('gambarqr') . '/' . $namaGambarQR; // Path lengkap untuk gambar QR
            // file_put_contents($pathGambarQR, $qr); // Menyimpan gambar QR
            
    
            // Melanjutkan dengan menyimpan data produk kopi
            $kopi = new Kopi();
            $kopi->kode_kopi = $newKodeKopi;
            $kopi->kode_peremajaan = $request->input('kode_peremajaan');
            $kopi->varietas_kopi = $request->input('varietas_kopi');
            $kopi->metode_pengolahan = $request->input('metode_pengolahan');
            $kopi->tgl_roasting = $request->input('tgl_roasting');
            $kopi->tgl_panen = $request->input('tgl_panen');
            $kopi->tgl_exp = $request->input('tgl_exp');
            $kopi->berat = $request->input('berat');
            $kopi->link = "https://sipkopi.com/produk/".$newKodeKopi ;
            $kopi->deskripsi = $request->input('deskripsi');
            $kopi->stok = $request->input('stok');
            $kopi->gambar1 =  $gambarUrl;
            $kopi->gambarqr =  $gambarUrl;
            $kopi->save();
    
            return response()->json(['message' => 'Data Kopi berhasil ditambah', 'data' => $kopi], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan data Kopi: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // ->merge('/storage/app/twitter.jpg')
  //  Error: Class "App\Http\Controllers\Api\QrCode" not found in file C:\laragon\www\ProjectSipKopi\app\Http\Controllers\Api\KopiApi.php on line 66



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
    public function delete($kode_kopi){
        $kopi = kopi::where('kode_kopi', $kode_kopi)->first();
        if ($kopi) {
            try {
                $namaGambar = basename($kopi->gambar1);
    
                // Hapus gambar terkait
                $gambarPath = public_path('gambarproduk/' . $namaGambar);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
    
                // Hapus data pengguna dari database
                $kopi->delete();
    
                return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
            } catch (\Exception $e) {
                return response()->json(['error' => true, 'message' => 'Data tidak dapat dihapus karena berelasi dengan lahan!']);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Data tidak ditemukan!']);
        }
    }
    
    


}