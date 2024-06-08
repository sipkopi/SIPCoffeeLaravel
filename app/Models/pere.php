<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pere extends Model
{
    public function alldata(){
        return DB::table('data_peremajaan')->get();
    }

    public function hapusdata($kode_peremajaan){
        DB::table('data_peremajaan')->where('kode_peremajaan', $kode_peremajaan)->delete();
    }

    public function editdata($kode_peremajaan){
        return DB::table('data_peremajaan')->where('kode_peremajaan', $kode_peremajaan)->first();
     }


    public function addData($data){
        return DB::table('data_peremajaan')->insert($data);
      }

      protected $table = 'data_peremajaan'; // Nama tabel yang sesuai
      protected $primaryKey = 'kode_peremajaan';
      protected $fillable = [
          'kode_peremajaan',
          'kode_lahan',
          'perlakuan',
          'tanggal',
          'kebutuhan',
          'pupuk',
      ];
      
      // Jika Anda memiliki kolom timestamps (created_at dan updated_at), atur property berikut menjadi false
      public $timestamps = false;
}
