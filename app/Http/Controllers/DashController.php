<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\akun;
use App\Models\lahan;
use App\Models\pere;
use App\Models\kopi;


class DashController extends Controller
{

    public function __construct()
    {
        $this->akun = new akun();
        $this->lahan = new lahan();
        $this->pere = new pere();
        $this->kopi = new kopi();
    }


    public function index(){
        if(!session('login')){
            return redirect('/');
        }else{

            $data = [
                't_akun' =>$this->akun->datadb(),
                't_lahan' => $this->lahan->alldata(),
                't_pere' => $this->pere->alldata(),
                't_kopi' => $this->kopi->alldata(),
            ];
        return view('admin.dashboard' ,$data);
    }
}

public function detailadmin($user){
    if(!session('login')){
        return redirect('/');
    }else{
    $data = [
        'main' => $this->akun->detailadmin($user),
    ];
    return view('admin.detailadmin', $data);
}
}

public function edittadmin($user){
    if(!session('login')){
        return redirect('/');
    }else{
    $data = [
        'mainn' => $this->akun->detailadmin($user),
    ];
    return view('admin.editadmin', $data);
}
}

}
