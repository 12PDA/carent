@extends('core_backend')

@section ('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h5>Peminjaman Kendaraan</h5>
            <span>Pastikan <code>Data</code> telah <code>sesuai</code></span>
        </div>
        <div class="card-block">
            <form action="{{ url('proses_tambah_customer') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <textarea name="alamat" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="number" name="telepon" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor SIM</label>
                    <div class="col-sm-10">
                        <input type="number" name="sim" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label"></label>
                    <div class="col-sm-6">
                    <button class="btn waves-effect waves-light btn-primary"><i class="ti-plus"></i>Tambah</button>     
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop