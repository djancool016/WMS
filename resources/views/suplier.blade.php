@extends('layouts.master')
@section('judul')
    Daftar Suplier
@endsection
@section('content')
<table class="table text-center" id="tb_suplier">
    <thead>
        <tr>
            <th class="d-none">ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($supplier as $s)
        <tr>
            <th class="d-none"> {{$s->id}} </th>
            <td> {{$s->nama}} </td>
            <td> {{$s->email}} </td>
            <td> {{$s->telp}} </td>
            <td> {{$s->alamat}} </td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>

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