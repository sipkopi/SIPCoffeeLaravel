<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\harga;

class HargaController extends Controller
{

// objeck
    public function __construct(){
        // auth
        // $this->middleware('auth');
        $this ->harga = new harga();
    }

// tampil data
    public function index(){
        if(!session('login')){
            return redirect('/');
        }else{
        $alldata = [
            'alldata'=>$this->harga->alldata(),
            // 'caridata' => $this->akun->caridata(request()->cari),
        ];
        return view('hargakopi.dataharga', $alldata);
    }
}
    
// simpan
    public function save(){
        Request()->validate([
            'namav' => 'required|max:25',
            'harga' => 'required|max:255',
            'sumber' => 'required|',  
        ],[
            
        ]);

        $data = [
            'nama_varietas'=> request()->namav,
            'harga'=> request()->harga,
            'sumber'=> request()->sumber,
        ];

        $this->harga->addData($data);
        return redirect()->route('hargakopi', ['alert' => 'success']);
}

// tampil by kode
public function editharga($id){
    if(!session('login')){
        return redirect('/');
    }else{
    $data = [
        'main' => $this->harga->editdata($id),
        // 'alluser'=>$this->akun->datadb(),
    ];
    return view('hargakopi.editharga', $data);
}
}


public function simpan(Request $request, $id){
    // Validasi data jika diperlukan
    $request->validate([
        // Tambahkan aturan validasi di sini sesuai kebutuhan Anda
    ]);

    // Cari data lahan berdasarkan kode_lahan
    $harga = harga::where('id', $id)->first();

    // Periksa apakah data lahan ditemukan
    if (!$harga) {
        return response()->json(['success' => false, 'message' => 'Data harga kopi tidak ditemukan']);
    }

    // Update data lahan
    $harga->id = $request->id;
    $harga->nama_varietas = $request->namav;
    $harga->harga = $request->harga;
    $harga->sumber = $request->sumber;
    $harga->save();

    // Kirim respons
    return response()->json(['success' => true, 'message' => 'Data harga kopi berhasil diupdate']);
}


// hapus
public function hapusData($id)
{
    if(!session('login')){
        return redirect('/');
    }else{
    $idd = harga::where('id', $id)->first();
    
    if ($idd) {
        try {
            $idd->delete();
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