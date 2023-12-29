<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Mobil;

class MobilController extends Controller
{
    function index(){
        $data['mobil'] = \App\Models\Mobil::all();
        return view('mobil.a_view_mobil', $data);
    }

    function tambah(){
        return view('mobil.a_add_mobil');
    }

    function proses_tambah(Request $request){
        $filetype = '|file|image|mimes:jpeg,png,jpg|max:2048';
        $filename = $request->file('gambar');
        $nama_file = time()."_".$filename->getClientOriginalName();
        $fileloc   = '../public/uploads/';
        $filename->move($fileloc,$nama_file);
        \App\Models\Mobil::create([
            'merek'  => $request->merek,
            'model'   => $request->model,
            'warna' => $request->warna,
            'nopol'   => $request->nopol,
            'tarif'   => $request->tarif,
            'foto'       => $nama_file,
        ]);
        return redirect('/admin_mobil');
    }

    function detail($id){
        $data['mobil'] = DB::table('mobil')
                        ->where('mobil.id_mobil', $id)
                        ->get();
        return view('mobil.a_detail_mobil', $data);
    }

    function edit($id){
        $data['mobil'] = Mobil::where('id_mobil', $id)->first();
        return view('mobil.a_edit_mobil', $data);
    }

    public function proses_update(Request $request, $id){
        $cek = $request->gambar;
        if($cek != null){
            $gambar = Mobil::select('foto')->where('id_mobil', $id)->first();
            File::delete(public_path('/uploads/').$gambar->foto);

            $filetype = '|file|image|mimes:jpeg,png,jpg|max:2048';
            $filename = $request->file('gambar');
            $nama_file = time()."_".$filename->getClientOriginalName();
            $fileloc   = '../public/uploads/';
            $filename->move($fileloc,$nama_file);

            $edit = DB::table('mobil')->where('id_mobil', $id)->update([
                'merek'  => $request->merek,
                'model'   => $request->model,
                'warna' => $request->warna,
                'nopol'   => $request->nopol,
                'tarif'   => $request->tarif,
                'foto'       => $nama_file
            ]);

            return redirect('/admin_mobil');
        }
        //Edit data tanpa foto
        $edit = DB::table('mobil')->where('id_mobil', $id)->update([
            'merek'  => $request->merek,
            'model'   => $request->model,
            'warna' => $request->warna,
            'nopol'   => $request->nopol,
            'tarif'   => $request->tarif
        ]);
        return redirect('/admin_mobil');
    }

    function hapus($id){
        $gambar = Mobil::where('id_mobil', $id)->first();
            File::delete(public_path('/uploads/').$gambar->foto);
            Mobil::where('id_mobil', $id)->delete();
        return redirect('/admin_mobil');
    }
}
