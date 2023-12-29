@extends('core_backend')

@section ('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h5>Tambah Customer</h5>
            <span>Pastikan <code>Data Customer</code> telah <code>sesuai</code></span>
        </div>
        <div class="card-block">
            <form action="{{ url('admin_customer_update/'.$cust->id_customer) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" value="{{$cust->nama}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <textarea name="alamat" cols="5" rows="5" class="form-control">{{$cust->alamat}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="number" name="telepon" class="form-control" value="{{$cust->telepon}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor SIM</label>
                    <div class="col-sm-10">
                        <input type="number" name="sim" class="form-control" value="{{$cust->sim}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label"></label>
                    <div class="col-sm-6">
                    <button class="btn waves-effect waves-light btn-primary"><i class="ti-check"></i>Simpan</button>     
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop