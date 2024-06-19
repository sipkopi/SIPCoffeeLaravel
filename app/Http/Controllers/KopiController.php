<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kopi;

// require_once('../phpqrcode/qrlib.php');
// use SimpleSoftwareIO\QrCode\Facades\QrCode;

// use Milon\Barcode\Facades\DNS2DFacade as DNS2D;
// use Milon\Barcode\DNS2D;

class KopiController extends Controller
{
    
    public function __construct(){
        // auth
        // $this->middleware('auth');
        $this ->kopi = new kopi();
    }

    public function index(){
        if(!session('login')){
            return redirect('/akses/login');
        }else{
        $alldata = [
            'alldata'=>$this->kopi->alldata(),
            // 'caridata' => $this->akun->caridata(request()->cari),
        ];
        return view('datakopi.datakopi', $alldata);
    }
}


// tambah kopi
public function save(Request $request){
    if(!session('login')){
        return redirect('/akses/login');
    } else {
        // Validasi input
        $request->validate([
            'kdkopi' => 'required',
            'pere' => 'required',
            'vari' => 'required',
            'tglpan' => 'required',
            'tglroas' => 'required',
            'tglexp' => 'required',
            'berat' => 'required',
            'stok' => 'required',
            'metode' => 'required',
            'harga' => '',
            'desk' => 'required',
            'img1' => 'image|mimes:jpg,png,gif,jpeg|max:5120',
        ], [
            'img1' => 'Gambar wajib diunggah',
        ]);

        // Inisialisasi variabel untuk menyimpan URL gambar
        $gambarUrl = null;
        
        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('img1')) {
            $gambar = $request->file('img1'); // Mengambil file gambar dari request
            $ekstensi = $gambar->getClientOriginalExtension();
            // Membuat nama file yang unik dengan menambahkan tanggal saat ini (tahun-bulan-hari)
            $namaGambar = date('Ymd') . '_' . uniqid() . '.' . $ekstensi;
            $gambar->move(public_path('gambarproduk/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan
            $gambarUrl = asset('gambarproduk/' . $namaGambar); // Menghasilkan URL gambar
        }

        $urll = 'https://spkopi.com/produk/' . $request->kdkopi;

        // Data yang akan disimpan
        $data = [
            'kode_kopi' => $request->kdkopi,
            'kode_peremajaan' => $request->pere,
            'varietas_kopi' => $request->vari,
            'metode_pengolahan' => $request->metode,
            'tgl_roasting' => $request->tglroas,
            'tgl_panen' => $request->tglpan,
            'tgl_exp' => $request->tglexp,
            'berat' => $request->berat,
            'link' => $urll,
            'deskripsi' => $request->desk,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar1' => $gambarUrl, // Menggunakan URL gambar jika ada, jika tidak tetap null
            'gambarqr' => $gambarUrl, // Harusnya menghasilkan URL QR, tetapi kode yang menghasilkannya tidak ada dalam contoh yang Anda berikan
        ];

        // Menyimpan data ke database
        $this->kopi->addData($data);
        return redirect()->route('kopi', ['alert' => 'success']);
    }
}


public function updatee(Request $request, $kode_kopi){
    if(!session('login')){
        return redirect('/akses/login');
    } else {

        $kopi = $this->kopi->find($kode_kopi);

        // Validasi input
        $request->validate([
            'kdkopi' => 'required',
            'pere' => 'required',
            'vari' => 'required',
            'tglpan' => 'required',
            'tglroas' => 'required',
            'tglexp' => 'required',
            'berat' => 'required',
            'stok' => 'required',
            'harga' => '',
            'metode' => 'required',
            'desk' => 'required',
            'upload11' => 'image|mimes:jpg,png,gif,jpeg|max:5120',
        ], [
            'upload11' => 'Gambar wajib diunggah',
        ]);

        $gambarUrl = ''; // Definisikan variabel $gambarUrl di luar blok if dengan nilai default kosong

        if ($request->hasFile('upload11')) {
            // Menghapus gambar lama jika ada
            if (!empty($kopi->gambar1)) {
                $gambarPath = public_path('gambarproduk/' . basename($kopi->gambar1));
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }

            $gambar = $request->file('upload11'); // Mengambil file gambar dari request
            $ekstensi = $gambar->getClientOriginalExtension();
            // Membuat nama file yang unik dengan menambahkan tanggal saat ini (tahun-bulan-hari)
            $namaGambar = date('Ymd') . '_' . uniqid() . '.' . $ekstensi;
            $gambar->move(public_path('gambarproduk/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan
            $gambarUrl = asset('gambarproduk/' . $namaGambar); // Menghasilkan URL gambar

            // Perbarui data gambar di database
            $kopi->gambar1 = $gambarUrl;
        }

        $urll = 'https://spkopi.com/produk/' . $request->kdkopi;

        // Data yang akan disimpan
        $data = [
            'kode_kopi' => $request->kdkopi,
            'kode_peremajaan' => $request->pere,
            'varietas_kopi' => $request->vari,
            'metode_pengolahan' => $request->metode,
            'tgl_roasting' => $request->tglroas,
            'tgl_panen' => $request->tglpan,
            'tgl_exp' => $request->tglexp,
            'berat' => $request->berat,
            'link' => $urll,
            'deskripsi' => $request->desk,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar1' => $gambarUrl, // Menggunakan URL gambar jika ada, jika tidak tetap null
            'gambarqr' => $gambarUrl, // Harusnya menghasilkan URL QR, tetapi kode yang menghasilkannya tidak ada dalam contoh yang Anda berikan
        ];

        // Menyimpan data ke database
        $this->kopi->ubahdatakopi($kode_kopi, $data);
        return redirect()->route('kopi')->with('success', 'Data berhasil diperbarui');
    }
}




public function editkopii($kode_kopi){
    if(!session('login')){
        return redirect('/akses/login');
    }else{
    $data = [
        'main' => $this->kopi->editdatakopi($kode_kopi),
    ];
    return view('datakopi.editkopi', $data);
}
}


public function hapusData($kode_kopi){
    if(!session('login')){
        return redirect('/akses/login');
    }else{
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


}




        // $gambar = $request->file('img1'); // Mengambil file gambar dari request
        // $ekstensi = $gambar->getClientOriginalExtension();
        // $namaGambar = date('Ymd') . $request->kdkopi . '.' . $ekstensi;
        // $gambar->move(public_path('gambarproduk/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan

        // QrCode::size(300)->generate($urll); 
        // // Membuat QR Code tanpa menyimpannya sebagai file gambar
        // $namaqr = date('Ymd') . $request->kdkopi; // Membuat nama file gambar QR Code
        // QrCode::size(300)->format('png')->generate($urll, public_path("gambarqr/{$namaqr}.png")); 
        
        // $qr_code_filename = 'gambarqr/' . $request->kdkopi; // Path relatif ke direktori publik
        // QRcode::png($urll, public_path($qr_code_filename), 'H', 10);
        // $namaqr = date('Ymd') . $request->kdkopi . '.png'; // Misalnya, KPK0001.png
