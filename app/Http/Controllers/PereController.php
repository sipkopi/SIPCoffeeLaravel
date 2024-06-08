<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pere;

class PereController extends Controller
{

// objeck
    public function __construct(){
        // auth
        // $this->middleware('auth');
        $this ->pere = new pere();
    }

// tampil data
    public function index(){
        if(!session('login')){
            return redirect('/');
        }else{
        $alldata = [
            'alldata'=>$this->pere->alldata(),
            // 'caridata' => $this->akun->caridata(request()->cari),
        ];
        return view('datapere.datapere', $alldata);
    }
}
    
// simpan
    public function save(){
        Request()->validate([
            'kodepere' => 'required|max:25',
            'kodelahan' => 'required|max:255',
            'perlakuan' => 'required|',
            'tgl' => 'required|max:50',
            'kebutuhan' => 'required|max:50',
            'pupuk' => 'required|max:50',
            
        ],[
            'kodepere.required' => 'kode wajib diisi',
            'kodelahan.required' => 'kode lahan wajib diisi',
            'perlakuan.required' => 'perlakuan wajib diisi',
            'tgl.required' => 'tgl wajib diisi',
            'kebutuhan.required' => 'kebutuhan wajib diisi',
            'pupuk.required' => 'pupuk wajib diisi',
        ]);

        $data = [
            'kode_peremajaan'=> request()->kodepere,
            'kode_lahan'=> request()->kodelahan,
            'perlakuan'=> request()->perlakuan,
            'tanggal'=> request()->tgl,
            'kebutuhan'=> request()->kebutuhan,
            'pupuk'=> request()->pupuk,
        ];

        $this->pere->addData($data);
        return redirect()->route('pere', ['alert' => 'success']);
}

// tampil by kode
public function editpere($kode_peremajaan){
    if(!session('login')){
        return redirect('/');
    }else{
    $data = [
        'main' => $this->pere->editdata($kode_peremajaan),
        // 'alluser'=>$this->akun->datadb(),
    ];
    return view('datapere.editpere', $data);
}
}


public function simpan(Request $request, $kode_peremajaan){
    // Validasi data jika diperlukan
    $request->validate([
        // Tambahkan aturan validasi di sini sesuai kebutuhan Anda
    ]);

    // Cari data lahan berdasarkan kode_lahan
    $pere = pere::where('kode_peremajaan', $kode_peremajaan)->first();

    // Periksa apakah data lahan ditemukan
    if (!$pere) {
        return response()->json(['success' => false, 'message' => 'Data Peremajaan tidak ditemukan']);
    }

    // Update data lahan
    $pere->kode_peremajaan = $request->kodeperemajaan;
    $pere->kode_lahan = $request->kodelahan;
    $pere->perlakuan = $request->perlakuan;
    $pere->tanggal = $request->tgl;
    $pere->kebutuhan = $request->kebutuhan;
    $pere->pupuk = $request->pupuk;
    $pere->save();

    // Kirim respons
    return response()->json(['success' => true, 'message' => 'Data Peremajaan berhasil diupdate']);
}


// hapus
public function hapusData($kode_peremajaan)
{
    if(!session('login')){
        return redirect('/');
    }else{
    $peree = Pere::where('kode_peremajaan', $kode_peremajaan)->first();
    
    if ($peree) {
        try {
            $peree->delete();
            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => true, 'message' => 'Data tidak dapat dihapus karena berelasi dengan produk!']);
        }
    } else {
        return response()->json(['error' => true, 'message' => 'Data tidak ditemukan!']);
    }
}
}



}
