<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Transaksi;
use App\Models\Transaksi_detail;
use App\Models\Mobil;

class PengembalianController extends Controller
{
    function index(){
        $data['mobil'] = \App\Models\Mobil::all();
        $data['pinjam'] = DB::table('transaksi')
                            ->join('transaksi_detail', 'transaksi.id_transaksi', '=', 'transaksi_detail.id_transaksi')
                            ->join('customer', 'transaksi.id_customer', '=', 'customer.id_customer')
                            ->join('mobil', 'transaksi_detail.id_mobil', '=', 'mobil.id_mobil')
                            ->orderby('transaksi.tgl_pinjam', 'desc')
                            ->get();
        return view('pengembalian.a_view_kembali', $data);
    }

    function proses_kembali(Request $request){
        $id_nopol = $request->nopol;
        // // dd($id_nopol);
        // $findNopol = Mobil::where('nopol', $id_nopol)->first();
        // dd($findNopol);

        // $findTrans = DB::table('transaksi')
        //                 ->select('transaksi.id_transaksi')
        //                 ->join('transaksi_detail', 'transaksi.id_transaksi', '=', 'transaksi_detail.id_transaksi')
        //                 ->join('customer', 'transaksi.id_customer', '=', 'customer.id_customer')
        //                 ->join('mobil', 'transaksi_detail.id_mobil', '=', 'mobil.id_mobil')
        //                 ->where('mobil.nopol', '=', $id_nopol)
        //                 ->orderby('transaksi.tgl_pinjam', 'desc')
        //                 ->get();

        // $edit = DB::table('transaksi')->where('id_transaksi', $findTrans)->update([
        //     'status'    => 1
        // ]);
        // return redirect('/admin_pengembalian');


        $findNopol = Mobil::where('nopol', $id_nopol)->first();
        // dd($findNopol);

        $findTrans = DB::table('transaksi')
                        ->select('transaksi.id_transaksi')
                        ->join('transaksi_detail', 'transaksi.id_transaksi', '=', 'transaksi_detail.id_transaksi')
                        ->join('mobil', 'transaksi_detail.id_mobil', '=', 'mobil.id_mobil')
                        ->where('mobil.nopol', '=', $id_nopol)
                        ->pluck('transaksi.id_transaksi');
        // dd($findTrans);
        $edit = DB::table('transaksi')->where('id_transaksi', $findTrans)->update([
                'status'    => 1
            ]);
            return redirect('/admin_pengembalian');
    }
}
