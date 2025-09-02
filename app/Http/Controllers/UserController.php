<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\QueryContainer as Helpers;
use App\Models\Transaction;
use App\Models\Item;
use App\Models\Spesifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->helper = new Helpers();
    }

    public function index()
    {
        // $item = $this->helper->getAllItem();
        $idCustomer = Session::get('userdata')->id;

        $unpaidTransactionCount = Transaction::where('Status', 'Belum Bayar')
                                                ->where('IdCustomer', $idCustomer)
                                                ->count();
        $paidTransactionCount = Transaction::where('Status', 'Sudah Bayar')
                                            ->where('IdCustomer', $idCustomer)
                                            ->count();
        $transactionCount = Transaction::where('IdCustomer', $idCustomer)
                                        ->count();

        return view('customers',[
            'unpaidTransactionCount' => $unpaidTransactionCount,
            'paidTransactionCount' => $paidTransactionCount,
            'transactionCount' => $transactionCount,
        ]);
    }

    public function trx_bayar()
    {
        return view('sudahbayar');
    }

    public function trx_belum()
    {
        return view('belumbayar');
    }

    public function produk()
    {
        return view('produk');
    }

    public function profile()
    {
        $idCustomer = Session::get('userdata')->id;

        $customers = User::where('id', $idCustomer)->get();

        return view('profile', compact('customers'));
    }

    public function profile_edit()
    {
        $idCustomer = Session::get('userdata')->id;

        $customers = User::where('id', $idCustomer)->get();

        return view('editprofile', compact('customers'));
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('/');
    }

    public function ajaxTable(Request $request)
    {
        $id_user = $request->id_user;
        // $item = $this->helper->getAllItem();
        return view('customers');
    }

    public function datatransaksi(Request $request){
        $level = Session::get('userdata')->level;

        if ($level == 0){
            $id = $request->id_user;
            $data = Transaction::where('IdCustomer', $id)
            ->where('Status', 'Belum Bayar')
            ->select('NamaPaket','JumlahPax','Harga','MetodePembayaran', 'Venue', 'WaktuMulai', 'WaktuSelesai', 'Status','Id')
            ->get();

            return response()->json(['data' => $data]);
        }
        if ($level == 1){
            $data = Transaction::where('Status', 'Sudah Bayar')
            ->select('NamaPaket','JumlahPax','Harga','bukti_pembayaran', 'Venue', 'WaktuMulai', 'WaktuSelesai', 'Status','Id')
            ->get();

            return response()->json(['data' => $data]);
        }
    }

    public function datatransaksiverif(){
        $data = Transaction::where('Status', 'Sudah Diverifikasi')
        ->select('NamaPaket','JumlahPax','Harga','bukti_pembayaran', 'Venue', 'WaktuMulai', 'WaktuSelesai', 'Status','Id')
        ->get();

        return response()->json(['data' => $data]);
    }

    public function datatransaksiDibayar(Request $request){
        $id = $request->id_user;
        $data = Transaction::where('IdCustomer', $id)
        ->where(function ($query) {
            $query->where('Status', 'Sudah Bayar')
                ->orWhere('Status', 'Sudah Diverifikasi');
        })
        ->select('NamaPaket','JumlahPax','Harga','MetodePembayaran', 'Venue', 'WaktuMulai', 'WaktuSelesai', 'Status','Id')
        ->get();

        return response()->json(['data' => $data]);
    }

    public function bataltransaksi(Request $request){
        $id_transaksi = $request->id;
        $data = Transaction::find($id_transaksi);
        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Data deleted successfully', "status" => 200], 200);
    }

    public function setujuitransaksi(Request $request){
        $id_transaksi = $request->id;

        $transaction = Transaction::find($id_transaksi);
        if (!$transaction) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        $transaction->status = 'Sudah Diverifikasi';
        $transaction->save();

        return response()->json(['message' => 'Transaksi berhasil diverifikasi', "status" => 200], 200);
    }

    public function getDetailTransaksi(Request $request){
        $id = $request->id;
        $data = Transaction::where('Id', $id)
        ->select('NamaPaket','JumlahPax','Harga','MetodePembayaran', 'Venue', 'WaktuMulai', 'WaktuSelesai', 'Status','Id')
        ->get();

        return response()->json(['data' => $data]);
    }

    public function saveBuktiBayar(Request $request){
        
        $request->validate([
            'id_transaksi' => 'required',
            'nama_event' => 'required',
            'harga' => 'required',
            'nama_bank' => 'required',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $idTransaksi = $request->input('id_transaksi');
        $namaEvent = $request->input('nama_event');
        $harga = $request->input('harga');
        $namaBank = $request->input('nama_bank');
        $buktiBayar = $request->file('bukti_bayar');

        // Proses penyimpanan file gambar
        if ($buktiBayar) {
            $namaFile = 'bukti_bayar_' . time() . '.' . $buktiBayar->getClientOriginalExtension();
            $path = $buktiBayar->storeAs('uploads', $namaFile);
        }

        // Lakukan pembaruan data menggunakan metode Eloquent
        $transaction = Transaction::find($idTransaksi);
        if ($transaction) {
            // Lakukan pembaruan status, bank_pembayaran, dan bukti_pembayaran
            $transaction->status = 'Sudah Bayar';
            $transaction->bank_pembayaran = $namaBank;
            $transaction->bukti_pembayaran = $namaFile;

            $transaction->save();

            return response()->json(['status' => '200', 'message' => 'Data berhasil disimpan.']);
        }

        return response()->json(['status' => '404', 'message' => 'Data transaksi tidak ditemukan.']);
    }

    public function downloadBuktiBayar(Request $request){
        $filePath = storage_path('app/uploads/' . $request->nama_file);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    }

    public function update_profile(Request $request, $id){
        if ($request->password_lama != NULL){
            $validatedData = $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'no_hp' => 'required',
                'jenis_kelamin' => 'required',
                'password_lama' => 'required',
                'password_baru' => 'required_with:password_lama|different:password_lama|min:6',
                'verifikasi_password' => 'required_with:password_lama|same:password_baru',
                'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Ubah sesuai kebutuhan
            ]);

            $user = User::findOrFail($id);

            // Periksa apakah password lama sesuai
            if (Hash::check($request->password_lama, $user->password)) {
                // Password lama sesuai, update data user
                $user->nama = $request->nama;
                $user->email = $request->email;
                $user->alamat = $request->alamat;
                $user->no_hp = $request->no_hp;
                $user->jenis_kelamin = $request->jenis_kelamin;

                // Jika password baru diisi, update password
                if ($request->password_baru) {
                    $user->password = Hash::make($request->password_baru);
                }

                // Jika upload foto profil, simpan foto baru
                if ($request->hasFile('foto_profil')) {
                    $imagePath = $request->file('foto_profil')->store('public/foto_profil');
                    $user->foto = str_replace('public/', '', $imagePath);
                }

                $user->save();

                return redirect()->back()->with('success', 'Data user berhasil diperbarui.');
            } else {
                return redirect()->back()->with('error', 'Password lama tidak sesuai.');
            }
        } else {
            $validatedData = $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'no_hp' => 'required',
                'jenis_kelamin' => 'required',
                'verifikasi_password' => 'required_with:password_lama|same:password_baru',
                'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Ubah sesuai kebutuhan
            ]);

            $user = User::findOrFail($id);

            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->no_hp = $request->no_hp;
            $user->jenis_kelamin = $request->jenis_kelamin;

            if ($request->hasFile('foto_profil')) {
                $imagePath = $request->file('foto_profil')->store('public/foto_profil');
                $user->foto = str_replace('public/', '', $imagePath);
            }

            $user->save();

            return redirect()->back()->with('success', 'Data user berhasil diperbarui.');
        }
    }

    public function refreshWidget(){
        $level = Session::get('userdata')->level;

        if ($level == 0){
            $idCustomer = Session::get('userdata')->id;

            $unpaidTransactionCount = Transaction::where('Status', 'Belum Bayar')
                                                    ->where('IdCustomer', $idCustomer)
                                                    ->count();
            $paidTransactionCount = Transaction::where('Status', 'Sudah Bayar')
                                                ->where('IdCustomer', $idCustomer)
                                                ->count();
            $transactionCount = Transaction::where('IdCustomer', $idCustomer)
                                            ->count();
            $data = array(
                'unpaid' => $unpaidTransactionCount,
                'paid' => $paidTransactionCount,
                'total' => $transactionCount,
            );

            return response()->json(['data' => $data]);
        }

        if ($level == 1){
            $unpaidTransactionCount = Transaction::where('Status', 'Sudah Diverifikasi')
                                                    ->count();
            $paidTransactionCount = Transaction::where('Status', 'Sudah Bayar')
                                                ->count();
            $transactionCount = Transaction::count();
            $data = array(
                'unpaid' => $unpaidTransactionCount,
                'paid' => $paidTransactionCount,
                'total' => $transactionCount,
            );

            return response()->json(['data' => $data]);
        }
        
    }

    public function dataproduk(){
        $data = Item::all();

        return response()->json(['data' => $data]);
    }

    public function hapusproduk(Request $request){
        $id_produk = $request->id;
        $item = Item::find($id_produk);

        if (!$item) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        try {
            DB::beginTransaction();
            $countSpecifications = Spesifikasi::where('IdItem', $item->Id)->count();

            if ($countSpecifications > 0) {
                // Hapus data terkait dari tabel Spesifikasi berdasarkan IdItem
                $deleted = Spesifikasi::where('IdItem', $item->Id)->delete();
            
                if (!$deleted) {
                    DB::rollBack(); // Batalkan transaksi jika penghapusan Spesifikasi gagal
                    return response()->json(['message' => 'Failed to delete related specifications'], 500);
                }
            } else {

            }
            // Hapus data dari tabel Item
            $item->delete();
        
            DB::commit(); // Commit transaksi jika operasi selesai tanpa masalah
        
            return response()->json(['message' => 'Data deleted successfully', 'status' => 200], 200);
        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan transaksi jika terjadi kesalahan atau exception
            return response()->json(['message' => 'An error occurred while deleting data'], 500);
        }
    }

    public function getDetailProduk(Request $request){
        $id = $request->id;
        $data = Item::where('Id', $id)->get();

        return response()->json(['data' => $data]);
    }

    public function saveEditproduk(Request $request) {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
            'foto_sampel' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $id = $request->input('id');
        $nama = $request->input('nama');
        $kategori = $request->input('kategori');
        $keterangan = $request->input('keterangan');
        $fotoSampel = $request->file('foto_sampel');

        $slug = Str::slug($nama, '-'); // Menggunakan fungsi Str::slug dari Laravel

        // Lakukan pemeriksaan jika slug sudah ada dalam basis data
        // $count = Item::where('Slug', $slug)->count();
        // if ($count > 0) {
        //     $slug = $slug . '-' . ($count + 1); // Tambahkan nomor untuk membuat slug unik jika sudah ada
        // }
        $item = Item::find($id);
        // Proses penyimpanan file gambar
        if ($fotoSampel) {
            $imagePath = $request->file('foto_sampel')->store('public/foto_produk');
            $item->Img = str_replace('public/', '', $imagePath);
        }

        // Lakukan pembaruan data menggunakan metode Eloquent
        
        if ($item) {
            // Lakukan pembaruan status, bank_pembayaran, dan bukti_pembayaran
            $item->Nama = $nama;
            $item->Slug = $slug;
            $item->Kategori = $kategori;
            $item->Keterangan = $keterangan;

            $item->save();

            return response()->json(['status' => '200', 'message' => 'Data berhasil disimpan.']);
        }

        return response()->json(['status' => '404', 'message' => 'Data produk tidak ditemukan.']);
    }

    public function saveTambahproduk(Request $request) {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
            'foto_sampel' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $nama = $request->input('nama');
        $kategori = $request->input('kategori');
        $keterangan = $request->input('keterangan');
        $fotoSampel = $request->file('foto_sampel');

        $slug = Str::slug($nama, '-');

        $count = Item::where('Slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $item = new Item();
        // Proses penyimpanan file gambar
        if ($fotoSampel) {
            $imagePath = $request->file('foto_sampel')->store('public/foto_produk');
            $item->Img = str_replace('public/', '', $imagePath);
        }
        
        $item->Nama = $nama;
        $item->Slug = $slug;
        $item->Kategori = $kategori;
        $item->Keterangan = $keterangan;

        $item->save();

        return response()->json(['status' => '200', 'message' => 'Data berhasil disimpan.']);
    }

    public function variasi($slug)
    {
        $item = Item::where('Slug', $slug)->first();
        
        // $variasi = Spesifikasi::where('IdItem', $item->Id)->get();
        
        return view('variasi', compact('item'));
    }

    public function datavariasi(Request $request){
        $id_produk = $request->id;
        $data = Spesifikasi::where('IdItem', $id_produk)->get();

        return response()->json(['data' => $data]);
    }

    public function getDetailVariasi(Request $request){
        $id = $request->id;
        $data = Spesifikasi::where('Id', $id)->get();

        return response()->json(['data' => $data]);
    }

    public function saveEditvariasi(Request $request) {
        $request->validate([
            'id' => 'required',
            'jumlah_pax' => 'required',
            'detail' => 'required',
            'harga' => 'required',
        ]);

        $id = $request->input('id');
        $jumlah_pax = $request->input('jumlah_pax');
        $detail = $request->input('detail');
        $harga = $request->input('harga');

        $spesifikasi = Spesifikasi::find($id);
        
        if ($spesifikasi) {
            // Lakukan pembaruan status, bank_pembayaran, dan bukti_pembayaran
            $spesifikasi->Tag = $jumlah_pax;
            $spesifikasi->Detail = $detail;
            $spesifikasi->Harga = $harga;

            $spesifikasi->save();

            return response()->json(['status' => '200', 'message' => 'Variasi berhasil diupdate.']);
        }

        return response()->json(['status' => '404', 'message' => 'Data variasi tidak ditemukan.']);
    }

    public function saveTambahvariasi(Request $request) {
        $request->validate([
            'jumlah_pax' => 'required',
            'detail' => 'required',
            'harga' => 'required',
            'id_item' => 'required',
        ]);

        $id_item = $request->input('id_item');
        $jumlah_pax = $request->input('jumlah_pax');
        $detail = $request->input('detail');
        $harga = $request->input('harga');

        $spesifikasi = new Spesifikasi();
        // Proses penyimpanan file gambar
        
        $spesifikasi->IdItem = $id_item;
        $spesifikasi->Tag = $jumlah_pax;
        $spesifikasi->Detail = $detail;
        $spesifikasi->Harga = $harga;

        $spesifikasi->save();

        return response()->json(['status' => '200', 'message' => 'Variasi berhasil disimpan.']);
    }

    public function hapusvariasi(Request $request){
        $id_variasi = $request->id;
        $spesifikasi = Spesifikasi::find($id_variasi);

        if (!$spesifikasi) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        try {
            DB::beginTransaction();
        
            // Hapus data dari tabel Item
            $spesifikasi->delete();
        
            DB::commit(); // Commit transaksi jika operasi selesai tanpa masalah
        
            return response()->json(['message' => 'Variasi berhasil dihapus', 'status' => 200], 200);
        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan transaksi jika terjadi kesalahan atau exception
            return response()->json(['message' => 'An error occurred while deleting data'], 500);
        }
    }
}
