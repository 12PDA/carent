@extends('core_backend')

@section ('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Masukkan Nopol Kendaraan Yang Akan Dikembalikan </h5>
        </div>
        <div class="card-block">
            <form action="{{ url('admin_proses_kembali') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Plat Nomor</label>
                    <div class="col-sm-10">
                        <input type="text" name="nopol" class="form-control">
                        <input type="hidden" name="status" class="form-control" value="1">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <button class="btn waves-effect waves-light btn-primary"><i class="ti-check"></i>Proses</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<br>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Data Seluruh Peminjaman</h5>
            <!-- <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                    <li><i class="fa fa-window-maximize full-card"></i></li>
                    <li><i class="fa fa-minus minimize-card"></i></li>
                    <li><i class="fa fa-refresh reload-card"></i></li>
                    <li><i class="fa fa-trash close-card"></i></li>
                </ul>
            </div> -->
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id= "pantau" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Nopol</th>
                            <th>Nama Penyewa</th>
                            <th>Tarif Sewa/hari</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $no = 1;
                        @endphp
                        @foreach($pinjam as $object)
                        <tr>
                            <th scope="row">{{$no}}</th>
                            <td>{{$object->tgl_pinjam}}</td>
                            <td>{{$object->tgl_kembali}}</td>
                            <td>{{$object->nopol}}</td>
                            <td>{{$object->nama}}</td>
                            <td>{{$object->tarif}}</td>
                            @php
                                if($object->status == '0') $s = 'Belum Tersedia';
                                if($object->status == '1') $s = 'Tersedia';
                            @endphp
                            <td>{{$s}}</td>
                            <td>
                                <a href="{{ url('admin_mobil_detail') }}/{{ $object->id_mobil }}">
                                    <button class="btn waves-effect waves-light btn-primary"><i class="ti-search"></i></button>
                                </a>
                            </td>
                        </tr>
                        @php 
                            $no++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>
<script type="text/JavaScript" src="http://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#pantau').DataTable();
    });
</script>
@stop