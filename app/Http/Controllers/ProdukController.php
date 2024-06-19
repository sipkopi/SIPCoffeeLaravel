<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;
use App\Models\produk;
// use Illuminate\Support\Facades\Hash;

class ProdukController extends Controller
{
    
    public function __construct(){
        // auth
        // $this->middleware('auth');
        // $this ->Akun = new akun();
         $this ->Produk = new produk();
    }

    // public function index(){
    //     if(!session('login')){
    //         return redirect('/');
    //     }else{
    //     $alldata = [
    //         'alldata'=>$this->Akun->datadb(),
    //     ];
    //     return view('akun.datauser', $alldata);
    // }
    // }

    public function produk($kode_kopi){
        $data = [
            'main'=>$this->Produk->editdata($kode_kopi),
        ];
        return view('produklist.produklist', $data);
    
    }

 
}
