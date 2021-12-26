@extends('layouts.master')
@section('judul')
    Daftar Barang
@endsection
@section('content')
<table class="table text-center" id="tb_barang">
    <thead>
        <tr>
            <th class="d-none">ID</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Jenis</th>
            <th>Deskripsi</th>
            <th>Suplier</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($barang as $b)
        <tr>
            <th class="d-none"> {{$b->id}} </th>
            <td> {{$b->kode_barang}} </td>
            <td> {{$b->nama}} </td>
            <td> {{$b->harga}} </td>
            <td> {{$b->stock}} </td>
            <td> {{$b->jenis}} </td>
            <td> {{$b->deskripsi}} </td>
            <td> {{$b->suplier}} </td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>

<!-- MODAL STORE BARANG-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_store">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="m-4">
                <form action="/barang" method="POST" id="form_barang">
                    @csrf
                    <div class="form form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" name="harga" required>
                        <label for="stock">Stok</label>
                        <input type="text" class="form-control" name="stock" required>
                        <label for="jenis_barang_id">Jenis Barang</label>
                        <select class="custom-select" name="jenis_barang_id" required
                            <option selected value="">Pilih Jenis Barang...</option>
                            @forelse ($jenis_barang as $j)
                            <option value=" {{$j->id}} "> {{$j->jenis}} </option>
                            @empty
                            @endforelse
                        </select>
                        <label for="suplier_id">Suplier</label>
                        <select class="custom-select" name="suplier_id" required>
                            <option selected value="">Pilih Suplier...</option>
                            @forelse ($suplier as $s)
                            <option value=" {{$s->id}} "> {{$s->nama}} </option>
                            @empty
                            @endforelse
                        </select>
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" required>                       
                    </div>
                    <button type="submit" class="btn btn-primary" data-target=".tambah" >Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL UPDATE BARANG-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="m-4">
                <form action="/barang/update" method="POST" id="form_barang">
                    @method('PUT')
                    @csrf
                    <div class="form form-group">
                        <input type="hidden" class="form-control" name="id" id="id">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" required>
                        <label for="stock">Stok</label>
                        <input type="text" class="form-control" name="stock" id="stock" required>
                        <label for="jenis_barang_id">Jenis Barang</label>
                        <select class="custom-select" name="jenis_barang_id" id="jenis_barang_id" required>
                            <option selected value="">Pilih Jenis Barang...</option>
                            @forelse ($jenis_barang as $j)
                            <option value=" {{$j->id}} "> {{$j->jenis}} </option>
                            @empty
                            @endforelse
                        </select>
                        <label for="suplier_id">Suplier</label>
                        <select class="custom-select" name="suplier_id" id="suplier_id" required>
                            <option selected value="">Pilih Suplier...</option>
                            @forelse ($suplier as $s)
                            <option value=" {{$s->id}} "> {{$s->nama}} </option>
                            @empty
                            @endforelse
                        </select>
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" required>                       
                    </div>
                    <button type="submit" class="btn btn-primary" data-target=".tambah" >Tambah</button>
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
                <form action="/barang/delete" method="POST" id="form_barang">
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