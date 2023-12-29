@extends('core_backend')

@section ('content')
<div class="col-md-12">
    <a href="{{url('tambah_customer')}}">
        <button class="btn waves-effect waves-light btn-primary"><i class="ti-plus"></i>Tambah</button>
    </a>
</div>
<br>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Data Seluruh Customer</h5>
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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $no = 1;
                        @endphp
                        @foreach($cust as $object)
                        <tr>
                            <th scope="row">{{$no}}</th>
                            <td>{{$object->nama}}</td>
                            <td>{{$object->alamat}}</td>
                            <td>{{$object->telepon}}</td>
                            <td>
                                <a href="{{ url('customer_edit') }}/{{ $object->id_customer }}">
                                    <button class="btn waves-effect waves-light btn-info"><i class="ti-pencil-alt"></i></button>
                                </a>
                                <a href="{{ url('customer_hapus') }}/{{ $object->id_customer }}">
                                    <button class="btn waves-effect waves-light btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data {{ $object->nama }} ?');"><i class="ti-trash"></i></button>
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