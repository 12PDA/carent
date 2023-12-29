@extends('core_backend')
@section ('content')

<div class="col-md-12">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-block">
                    
                    @foreach ($mobil as $object)
                    <h3 align="center">Detail {{$object->model}}</h3>
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
                    <img src="{{ url('uploads') }}/{{ $object->foto }}" alt="" class="img-fluid" style="width: 600px; margin-left:auto; margin-right:auto;">
                </div>
                @endforeach
                
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@stop