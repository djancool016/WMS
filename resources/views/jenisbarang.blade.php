@extends('layouts.master')
@section('judul')
    Daftar Jenis Barang
@endsection
@section('content')
<table class="table text-center" id="tb_jenis">
    <thead>
        <tr>
            <th class="d-none">ID</th>
            <th>Kode</th>
            <th>Jenis Produk</th>
            <th>Total Jenis</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jenisBarang as $j)
        <tr>
            <th class="d-none"> {{$j->id}} </th>
            <td> {{$j->kode}} </td>
            <td> {{$j->jenis}} </td>
            <td>
                @if ($j->total_harga_stok == null)
                    {{ 0 }}   
                @else
                    {{ $j->jumlah_produk }}
                @endif 
            </td>
            <td> 
                @if ($j->total_harga_stok == null)
                {{ 0 }}   
            @else
                {{ $j->total_harga_stok }}
            @endif      
            </td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
<small>*A = Barang Sehari-hari (convenience goods) | B = Barang Toko (shopping goods) | C = Barang Khusus (speciality goods)</small>

<!-- MODAL STORE JENIS BARANG-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_store">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="m-4">
                <form action="/jenis_barang" method="POST">
                    @csrf
                    <div class="form form-group">
                        <label for="kode">Kode</label>
                        <select name="kode" class="custom-select">
                            <option value="A">A - Barang Sehari - hari</option>
                            <option value="B">B - Barang Toko</option>
                            <option value="C">C - Barang Khusus</option>
                        </select>
                        <label for="jenis">Jenis Produk</label>
                        <input type="text" class="form-control" name="jenis" required>                    
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- MODAL UPDATE JENIS BARANG-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="m-4">
                <form action="/jenis_barang/update" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form form-group">
                        <input type="hidden" class="form-control" name="id" id="id">
                        <label for="kode">Kode</label>
                        <select name="kode" class="custom-select" id="kode" required>
                            <option value="">--Pilih Kode--</option>
                            <option value="A">A - Barang Sehari - hari</option>
                            <option value="B">B - Barang Toko</option>
                            <option value="C">C - Barang Khusus</option>
                        </select>
                        <label for="jenis">Jenis Produk</label>
                        <input type="text" class="form-control" name="jenis" id="jenis" required>                    
                    </div>
                    <button type="submit" class="btn btn-primary" data-target=".tambah" >Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DELETE BARANG-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_delete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body m-4 text-center">
                <h5>Hapus Data?</h5>
                <br>
                <form action="/jenis_barang/delete" method="POST" id="form_barang">
                    @method('DELETE')
                    @csrf
                    <div class="form form-group">
                        <input type="hidden" class="form-control" name="id" id="id_delete">
                    <button type="submit" class="btn btn-primary" >Yes</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection