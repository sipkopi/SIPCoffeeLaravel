<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lahan;
use App\Models\akun;

class LahanController extends Controller
{
    
    public function __construct(){
        // auth
        // $this->middleware('auth');
        $this ->lahan = new lahan();
        $this ->akun = new akun();
    }

    public function index(){
        if(!session('login')){
            return redirect('/');
        }else{
        $alldata = [
            'alldata'=>$this->lahan->alldata(),
            'alluser'=>$this->akun->datadb(),
            // 'caridata' => $this->akun->caridata(request()->cari),
        ];
        return view('datalahan.datalahan', $alldata);
    }
}


public function save(){
    if(!session('login')){
        return redirect('/');
    }else{
        Request()->validate([
            'lahan' => 'required|max:25',
            'user' => 'required|max:255',
            'vari' => 'required|max:50',
            'bibit' => 'required|max:50',
            'luas' => 'required|max:50',
            'tinggi' => 'required|',
            'tgl' => 'required|',
            'latitude' => 'required|',
            'longtitude' => 'required|',

        ],[
            'lahan.required' => 'lahan wajib diisi',
            'user.required' => 'user wajib diisi',
            'vari.required' => 'vari wajib diisi',
            'bibit.required' => 'bibit wajib diisi',
            'luas.required' => 'luas wajib diisi',
            'tinggi.required' => 'tinggi wajib diisi',
            'tgl.required' => 'tgl wajib diisi',
            'latitude.required' => 'latitude wajib diisi',
            'longtitude.required' => 'longtitude wajib diisi',
        ]);

        $data = [
            'kode_lahan'=> request()->lahan,
            'user'=> request()->user,
            'varietas_pohon'=> request()->vari,
            'total_bibit'=> request()->bibit,
            'luas_lahan'=> request()->luas,
            'ketinggian_tanam'=> request()->tinggi,
            'tanggal'=> request()->tgl,
            'latitude'=> request()->latitude,
            'longtitude'=> request()->longtitude,
        ];

        $this->lahan->addData($data);
        return redirect()->route('lahan', ['alert' => 'success']);
}
}


public function editlahan($kode_lahan){
    if(!session('login')){
        return redirect('/');
    }else{
    $data = [
        'main' => $this->lahan->editdata($kode_lahan),
        'alluser'=>$this->akun->datadb(),
    ];
    return view('datalahan.editlahan', $data);
}
}


public function simpan(Request $request, $kode_lahan){
    // Validasi data jika diperlukan
    $request->validate([
        // Tambahkan aturan validasi di sini sesuai kebutuhan Anda
    ]);

    // Cari data lahan berdasarkan kode_lahan
    $lahan = lahan::where('kode_lahan', $kode_lahan)->first();

    // Periksa apakah data lahan ditemukan
    if (!$lahan) {
        return response()->json(['success' => false, 'message' => 'Data lahan tidak ditemukan']);
    }

    // Update data lahan
    $lahan->user = $request->user;
    $lahan->varietas_pohon = $request->vari;
    $lahan->total_bibit = $request->bibit;
    $lahan->luas_lahan = $request->luas;
    $lahan->ketinggian_tanam = $request->tinggi;
    $lahan->tanggal = $request->tgl;
    $lahan->latitude = $request->latitude;
    $lahan->longtitude = $request->longtitude;
    $lahan->save();

    // Kirim respons
    return response()->json(['success' => true, 'message' => 'Data lahan berhasil diupdate']);
}

public function hapusData($kode_lahan){
    if(!session('login')){
        return redirect('/');
    }else{
    $lahan = lahan::where('kode_lahan', $kode_lahan)->first();

    if ($lahan) {
        try {
            // Hapus data lahan dari database
            $lahan->delete();

            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Data tidak dapat dihapus karena berelasi dengan Peremajaan!']);
        }
    } else {
        return response()->json(['error' => true, 'message' => 'Data tidak ditemukan!']);
    }
}
}


}
