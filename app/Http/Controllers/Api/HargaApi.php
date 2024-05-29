<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\harga;

class HargaApi extends Controller
{

    public function __construct(){
        $this ->harga = new harga();
    }


    // tampil all data
    public function index(){
        $dataHarga = $this->harga->alldata();
        $formattedDataHarga = $dataHarga->map(function ($item) {
            $item->harga = number_format($item->harga, 0, ',', '.');
            return $item;
        });
    
        $alldata = [
            'Data Harga Kopi' => $formattedDataHarga,
        ];
        return response()->json($alldata);
    }
    
        // tampil by kode
        public function showid($id){
            $dataharga = $this->harga->editdata($id);
            if (!$dataharga) {
                return response()->json(['message' => 'Data Lahan not found'], 404);
            }
            
            // Format harga
            $dataharga->harga =  number_format($dataharga->harga, 0, ',', '.');
        
            return response()->json($dataharga);
        }


}
