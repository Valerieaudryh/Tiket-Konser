<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\QueryContainer as Helpers;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->helper = new Helpers();
    }

    public function packages_checkout($id)
    {
        $item = $this->helper->checkoutItem($id);
        $venue = $this->helper->getVenue();
        
        return view('checkout',['item' => $item, 'venue' => $venue]);
    }

    public function payment(Request $request)
    {
        $id_customer = $request->id_customer;
        $venue = $request->venue;
        $harga = $request->harga;
        $nama_produk = $request->nama_produk;
        $jumlah_pax = $request->jumlah_pax;
        $waktu_mulai = $request->waktu_mulai;
        $waktu_selesai = $request->waktu_mulai;
        $metode = "Transfer";

        $detailVenue = $this->helper->getSpecificVenue($venue);
        $nama_venue = $detailVenue[0]->Nama;
        $alamat_venue = $detailVenue[0]->Alamat;

        $transaction = $this->helper->setTransaction($id_customer,$harga,$nama_produk,$jumlah_pax,$metode,$nama_venue,$alamat_venue,$waktu_mulai,$waktu_selesai);
        if ($transaction){
            $status = array (
                'items' => array (
                    0 => array (
                        "status" => "Sukses",
                        "message" => "Transaksi Berhasil Dibuat, Silakan Cek Transaksi Saya Pada Riwayat Transaksi Untuk Info Selanjutnya Serta Pengiriman Bukti",
                    ),
                ),
            );
            return view('notify',compact('status'));
        }
    }
}
