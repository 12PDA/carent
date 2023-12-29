<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Transaksi;
use App\Models\Transaksi_detail;

class PeminjamanController extends Controller
{
    function index(){
        $data['mobil'] = \App\Models\Mobil::all();
        $data['pinjam'] = DB::table('transaksi')
                            ->join('transaksi_detail', 'transaksi.id_transaksi', '=', 'transaksi_detail.id_transaksi')
                            ->join('customer', 'transaksi.id_customer', '=', 'customer.id_customer')
                            ->join('mobil', 'transaksi_detail.id_mobil', '=', 'mobil.id_mobil')
                            ->orderby('transaksi.tgl_pinjam', 'desc')
                            ->get();
                            
        return view('peminjaman.a_view_pinjam', $data);
    }

    function tambah(){
        $data['mobil'] = \App\Models\Mobil::all();
        $user = Auth::user()->id;
        // dd($user);
        $data['customer'] = DB::table('customer')
            ->where('customer.id_customer', $user)
            ->first();
        // dd($data['customer']);
        return view('peminjaman.a_add_pinjam',$data);
    }

    function proses_tambah(Request $request){
        $transaksi = Transaksi::create(
            [
                'id_customer' => $request->id_customer,
                'status'      => 0,
                'tgl_pinjam'   => $request->tgl_pinjam,
                'tgl_kembali'   => $request->tgl_kembali,
                'tgl_update'    => NOW()
            ]
        );

        $id_transaksi =  $transaksi->id;
        Transaksi_detail::create([
                'id_transaksi' => $id_transaksi,
                'id_mobil' => $request->mobil_id,
            ]);
            return redirect('/admin_peminjaman');
    }
    
}
