@extends('core_backend')

@section ('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h5>Tambah Customer</h5>
            <span>Pastikan <code>Data Customer</code> telah <code>sesuai</code></span>
        </div>
        <!-- <div class="card-block">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" value="{{$customer->nama}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <textarea name="alamat" cols="5" rows="5" class="form-control">{{$customer->alamat}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="number" name="telepon" class="form-control"  value="{{$customer->telepon}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor SIM</label>
                    <div class="col-sm-10">
                        <input type="number" name="sim" class="form-control"  value="{{$customer->sim}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_pinjam" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_kembali" class="form-control">
                    </div>
                </div>
        </div> -->
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        @foreach($mobil as $object)
        <div class="col-md-6">
        <form action="{{ url('proses_pinjam_mobil') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="card">
                <div class="card-block">
                    <br>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th>Merek Kendaraan</th>
                                <th> : </th>
                                <td>{{ $object->merek }}</td>
                            </tr>
                            <tr>
                                <th>Model Kendaraan</th>
                                <th> : </th>
                                <td>{{ $object->model }}</td>
                            </tr>
                            <tr>
                                <th>Warna Kendaraan</th>
                                <th> : </th>
                                <td>{{ $object->warna }}</td>
                            </tr>
                            <tr>
                                <th>Plat Nomor</th>
                                <th> : </th>
                                <td>{{ $object->nopol }}</td>
                            </tr>
                            <tr>
                                <th>Tarif Sewa</th>
                                <th> : </th>
                                <td>{{ $object->tarif }} /hari</td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <h5>Foto Kendaraan</h5><br>
                    <img src="{{ url('uploads') }}/{{ $object->foto }}" alt="" class="img-fluid" style="height: 200px; width:auto; margin-left:auto; margin-right:auto;">
                    <br><br>
                    <input type="hidden" name="id_customer" value="{{Auth::user()->id}}">
                    <input type="hidden" name="mobil_id" value="{{$object->id_mobil}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_pinjam" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Kembali</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_kembali" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                        <button class="btn waves-effect waves-light btn-primary"><i class="ti-plus"></i>Proses</button>     
                        </div>
                    </div>
                </div>
                
            </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@stop