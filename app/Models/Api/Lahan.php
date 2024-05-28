<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lahan extends Model
{

    public function alldata(){
        return DB::table('data_lahan')->get();
    }
    public function editdata($kode_lahan){
        return DB::table('data_lahan')->where('kode_lahan', $kode_lahan)->first();
    }
    public function lahanuser($user){
        return DB::table('data_lahan')->where('user', $user)->get();
    }      

    protected $table = 'data_lahan';
    public $incrementing = false;
    protected $primaryKey = 'kode_lahan';
    protected $fillable = [
        'kode_lahan',
        'user',
        'varietas_pohon',
        'total_bibit',
        'luas_lahan',
        'tanggal',
        'ketinggian_tanam',
        'lokasi_lahan',
        'longtitude',
        'latitude',
    ];


    // Sesuaikan property timestamps sesuai kebutuhan
    public $timestamps = false;

}
