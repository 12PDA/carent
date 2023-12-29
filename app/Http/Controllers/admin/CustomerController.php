<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Customer;

class CustomerController extends Controller
{
    function index(){
        $data['cust'] = \App\Models\Customer::all();
        return view('customer.a_view_customer', $data);
    }

    function tambah(){
        return view('customer.a_add_customer');
    }

    function proses_tambah(Request $request){
        \App\Models\Customer::create([
            'nama'      => $request->nama,
            'alamat'  => $request->alamat,
            'telepon'     => $request->telepon,
            'sim'    => $request->sim,
        ]);
        return redirect('/admin_customer');
    }

    function edit($id){
        $data['cust'] = Customer::where('id_customer', $id)->first();
        return view('customer.a_edit_customer', $data);
    }

    public function proses_update(Request $request, $id){
        $edit = DB::table('customer')->where('id_customer', $id)->update([
            'nama'      => $request->nama,
            'alamat'  => $request->alamat,
            'telepon'     => $request->telepon,
            'sim'    => $request->sim
        ]);
        return redirect('/admin_customer');
    }

    function hapus($id){
        Customer::where('id_customer', $id)->delete();
        return redirect('/admin_customer');
    }
}
