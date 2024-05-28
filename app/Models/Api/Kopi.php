<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kopi extends Model
{

    public function alldata(){
        return DB::table('data_kopi')->get();
    }

    public function showpere($kode_peremajaan){
        return DB::table('data_kopi')->where('kode_peremajaan', $kode_peremajaan)->get();
    }    

    public function byekode($kode_kopi){
        return DB::table('data_kopi')->where('kode_kopi', $kode_kopi)->first();
    } 
    
    public function ubahdata($user, $data){
        DB::table('data_kopi')->where('user', $user)->update($data);
     }

    protected $table = 'data_kopi';
    protected $primaryKey = 'kode_kopi';
public $incrementing = false;
    protected $fillable = [
        'kode_kopi',
        'kode_peremajaan',
        'varietas_kopi',
        'metode_pengolahan',
        'tgl_roasting',
        'tgl_panen',
        'tgl_exp',
        'berat',
        'link',
        'deskripsi',
        'stok',
        'gambar1',
        'gambarqr',
    ];

    public $timestamps = false;

}


    // public function datadb(){
    //     return DB::table('data_kopi')->where('level', '<>', 'admin')->get();
    // }