<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class lahan extends Model
{
    public function alldata(){
        return DB::table('data_lahan')->get();
    }

    public function addData($data){
        return DB::table('data_lahan')->insert($data);
      }

      public function editdata($kode_lahan){
        return DB::table('data_lahan')->where('kode_lahan', $kode_lahan)->first();
     }


    public function hapusdata($id){
        DB::table('data_lahan')->where('kode_lahan', $id)->delete();
    }


    public function ubahdata($kode_lahan, $data){
        $affected = DB::table('data_lahan')->where('kode_lahan', $kode_lahan)->update($data);
    
        if ($affected === 0) {
            // No rows were updated. This means the `kode_lahan` didn't match any records.
            throw new \Exception("Tidak ada data yang diperbarui untuk kode lahan: {$kode_lahan}");
        }
    
        return true;
    }


    // all
    protected $table = 'data_lahan'; // Nama tabel yang sesuai
    protected $primaryKey = 'kode_lahan';
    protected $fillable = [
        'kode_lahan',
        'user',
        'varietas_pohon',
        'total_bibit',
        'luas_lahan',
        'ketinggian_tanam',
        'tanggal',
        'latitude',
        'longtitude',
    ];
    // Jika Anda memiliki kolom timestamps (created_at dan updated_at), atur property berikut menjadi false
    public $timestamps = false;


}
