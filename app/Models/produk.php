<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class produk extends Model
{

    public function editdata($kode_kopi)
    {
        return DB::table('data_kopi as dk')
            ->join('data_peremajaan as dp', 'dk.kode_peremajaan', '=', 'dp.kode_peremajaan')
            ->join('data_lahan as dl', 'dp.kode_lahan', '=', 'dl.kode_lahan')
            ->join('data_user as du', 'dl.user', '=', 'du.user')
            ->where('dk.kode_kopi', $kode_kopi)
            ->select('dk.*', 'dl.*', 'dp.*', 'du.*')
            ->first();
    }

}
