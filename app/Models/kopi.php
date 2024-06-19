<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kopi extends Model
{
    public function alldata(){
        return DB::table('data_kopi')->get();
    }

    public function hapusdata($id){
        DB::table('data_kopi')->where('kode_kopi', $id)->delete();
    }

    public function addData($data){
        return DB::table('data_kopi')->insert($data);
      }

      public function editdatakopi($kode_kopi){
        return DB::table('data_kopi')->where('kode_kopi', $kode_kopi)->first();
     }

     public function ubahdatakopi($kode_kopi, $data){
        DB::table('data_kopi')->where('kode_kopi', $kode_kopi)->update($data);
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
         'harga',
         'gambar1',
         'gambarqr',
     ];
 
     public $timestamps = false;

}
