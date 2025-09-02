<?php

namespace App\Helpers;
use App\Models\Item;
use App\Models\Spesifikasi;
use App\Models\Venue;
use App\Models\Transaction;

class QueryContainer
{
    public function getAllItem()
    {
        $item = Item::with('spesifikasi')->get();
        return $item;
    }

    public function getDetailItem($slug = null)
    {
        if ($slug) {
            $item = Item::select('*')
            ->with(['spesifikasi' => function($query) {
                return $query->select('*');
            }])
            ->whereHas('spesifikasi', function($query) use ($slug) {
                return $query->where('slug', $slug);
            })
            ->get();
            return $item;
        } else {
            return "Slug tidak valid";
        }
    }

    public function checkoutItem($id = null)
    {
        if ($id) {
            $item = Item::select('*')
            ->with(['spesifikasi' => function($query) use ($id) {
                return $query->where('Id', $id);
            }])
            ->whereHas('spesifikasi', function($query) use ($id) {
                return $query->where('Id', $id);
            })
            ->get();
            return $item;
        } else {
            return "Id tidak valid";
        }
    }

    public function getVenue()
    {
        $venue = Venue::select('*')
        ->get();
        return $venue;
    }

    public function getSpecificVenue($id)
    {
        $venue = Venue::where('Id', $id)->get();
        return $venue;
    }

    public function setTransaction($id_customer,$harga,$nama_paket,$jumlah_pax,$metode,$nama_venue,$alamat_venue,$waktu_mulai,$waktu_selesai){
        $transaction = new Transaction();

        // Memasukkan data ke dalam model
        $transaction->IdCustomer = $id_customer;
        $transaction->Harga = $harga;
        $transaction->NamaPaket = $nama_paket;
        $transaction->JumlahPax = $jumlah_pax;
        $transaction->MetodePembayaran = $metode;
        $transaction->Venue = $nama_venue;
        $transaction->AlamatVenue = $alamat_venue;
        $transaction->WaktuMulai = $waktu_mulai;
        $transaction->WaktuSelesai = $waktu_selesai;

        // Menyimpan data ke dalam database
        $transaction->save();

        if($transaction){
            return true;
        } else {
            return false;
        }
    }
}