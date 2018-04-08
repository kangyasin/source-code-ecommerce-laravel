<?php

namespace App\Http\Helpers;
use Steevenz\Rajaongkir;
class CustomHelper
{
    public $rajaongkir;

    public function __construct() {
      $rajaongkir = new Rajaongkir('0eb5bf295c8cdb7322cb47e4e7aa36b9', Rajaongkir::ACCOUNT_STARTER);
      // inisiasi dengan config array
      $config['api_key'] = '0eb5bf295c8cdb7322cb47e4e7aa36b9';
      $config['account_type'] = 'starter';

      $rajaongkir = new Rajaongkir($config);
      $this->details = $rajaongkir;
    }

    // @kangyasin fungsi untuk mendapatkan semua provinsi
    public function getProvince() {
        return $this->details->getProvinces();
    }

    // @kangyasin Fungsi untuk mendapatkan detail provinsi berdasarkan id provinsi
    public function detProvince($id) {
        return $this->details->getProvince($id);
    }

    // @kangyasin Fungsi untuk mendapatkan list kota berdasarkan id provinsi
    public function getKota($id_provinsi) {
        return $this->details->getCities($id_provinsi);
    }

    // @kangyasin Fungsi untuk mendapatkan detail kota berdasarkan id kota
    public function detKota($id_kota) {
        return $this->details->getCity($id_kota);
    }


    // @kangyasin Fungsi untuk mendapatkan harga berdasarkan idKota Kirim, idKota Tujuan, Berat dalam Gram dan Jenis Kurir
    public function getHarga($kotasal, $kotatujuan, $berat, $kurir) {
        return $this->details->getCost(['city' => 152], ['city' => $kotatujuan], $berat, $kurir);
    }

    ///////////////////////////////////////////////////////////////////
    ///////////// FUNGSI DIBAWAH DILUAR PAKET STARTER ////////////////
    /////////////////////////////////////////////////////////////////

    // @kangyasin Fungsi untuk mendapatkan list sub kota berdasarkan id kota
    public function getSubKota($id_kota) {
        return $this->details->getSubdistricts($id_kota);
    }

    // @kangyasin Fungsi untuk mendapatkan detail sub kota berdasarkan id sub kota
    public function detSubKota($id_subkota) {
        return $this->details->getSubdistrict($id_subkota);
    }



}
