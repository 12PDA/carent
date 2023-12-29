@extends('core_backend')

@section ('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h5>Tambah Kendaraan</h5>
            <span>Pastikan <code>Data Kendaraan</code> telah <code>sesuai</code></span>
        </div>
        <div class="card-block">
            <form action="{{ url('proses_tambah_mobil') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Merek Kendaraan</label>
                    <div class="col-sm-10">
                        <input type="text" name="merek" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Model Kendaraan</label>
                    <div class="col-sm-10">
                        <input type="text" name="model" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Warna</label>
                    <div class="col-sm-10">
                        <input type="text" name="warna" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Plat Nomor</label>
                    <div class="col-sm-10">
                        <input type="text" name="nopol" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tarif sewa/hari</label>
                    <div class="col-sm-10">
                        <input type="number" name="tarif" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" name="gambar" class="form-control">
                        <span><small class="text-danger">Foto seluruh badan kendaraan</small></span>
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