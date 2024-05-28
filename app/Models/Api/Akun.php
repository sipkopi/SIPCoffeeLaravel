<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Akun extends Model
{

    public function alldata(){
        return DB::table('data_user')->get();
    }

    public function datadb(){
        return DB::table('data_user')->where('level', '<>', 'admin')->get();
    }

    public function byuser($user){
        return DB::table('data_user')->where('user', $user)->first();
    }    

    public function byemail($email){
        return DB::table('data_user')->where('email', $email)->first();
    } 
    
    public function ubahdata($user, $data){
        DB::table('data_user')->where('user', $user)->update($data);
     }

    protected $table = 'data_user';
    protected $primaryKey = 'user';
public $incrementing = false;
    protected $fillable = [
        'user',
        'nama',
        'email',
        'nohp',
        'pass',
        'lokasi',
        'level',
        'tanggal_create',
        'gambar',
    ];

    public $timestamps = false;

}
