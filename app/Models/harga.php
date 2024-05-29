<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class harga extends Model
{
    public function alldata(){
        return DB::table('harga_kopi')->get();
    }

    // public function hapusdata($kode_peremajaan){
    //     DB::table('harga_kopi')->where('kode_peremajaan', $kode_peremajaan)->delete();
    // }

    public function editdata($id){
        return DB::table('harga_kopi')->where('id', $id)->first();
     }


    public function addData($data){
        return DB::table('harga_kopi')->insert($data);
      }

      protected $table = 'harga_kopi'; // Nama tabel yang sesuai
      protected $primaryKey = 'id';
      protected $fillable = [
          'id',
          'nama_varietas',
          'harga',
          'sumber',
      ];
      
      // Jika Anda memiliki kolom timestamps (created_at dan updated_at), atur property berikut menjadi false
      public $timestamps = false;
}
