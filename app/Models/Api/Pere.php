<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pere extends Model
{

    public function alldata(){
        return DB::table('data_peremajaan')->get();
    }
    public function editdata($kode_peremajaan){
        return DB::table('data_peremajaan')->where('kode_peremajaan', $kode_peremajaan)->first();
    }
    public function perelahan($kode_lahan){
        return DB::table('data_peremajaan')->where('kode_lahan', $kode_lahan)->get();
    }      

    protected $table = 'data_peremajaan';
    public $incrementing = false;
    protected $primaryKey = 'kode_peremajaan';
    protected $fillable = [
        'kode_peremajaan',
        'kode_lahan',
        'perlakuan',
        'tanggal',
        'kebutuhan',
        'pupuk',
    ];


    // Sesuaikan property timestamps sesuai kebutuhan
    public $timestamps = false;

}
