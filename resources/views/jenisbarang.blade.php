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
            <td> {{$j->jumlah_produk}} </td>
            <td> {{$j->total_harga_stok}} </td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
<small>*A = Barang Sehari-hari (convenience goods) | B = Barang Toko (shopping goods) | C = Barang Khusus (speciality goods)</small>

<!-- MODAL STORE SUPLIER-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_store">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="m-4">
                <form action="/suplier" method="POST" id="form_barang">
                    @csrf
                    <div class="form form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                        <label for="harga">Email</label>
                        <input type="email" class="form-control" name="email" required>
                        <label for="stock">Telp</label>
                        <input type="text" class="form-control" name="telp" required>   
                        <label for="stock">Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>                     
                    </div>
                    <button type="submit" class="btn btn-primary" data-target=".tambah" >Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- MODAL UPDATE SUPLIER-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="m-4">
                <form action="/suplier/update" method="POST" id="form_barang">
                    @method('PUT')
                    @csrf
                    <div class="form form-group">
                        <input type="hidden" class="form-control" name="id" id="id">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama"  id="nama" required>
                        <label for="harga">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                        <label for="stock">Telp</label>
                        <input type="text" class="form-control" name="telp" id="telp" required>   
                        <label for="stock">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" required>                     
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
                <form action="/suplier/delete" method="POST" id="form_barang">
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