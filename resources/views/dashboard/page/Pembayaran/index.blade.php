@extends('layout.dashboard.main')

@section('main-content-dashboard')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
            <a href="/" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- DataTales Example -->
            <div class="card shadow w-100 mb-4">
                <div class="card-header py-3">
                    <button class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Tambah Data Baru</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>TANGGAL DIBAYAR</th>
                                    <th>NAMA</th>
                                    <th>NOMINAL DIBAYAR</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal_dibayar}}</td>
                                        <td>{{ $item->Pelanggan->nama_pelanggan }}</td>
                                        <td>Rp. {{ number_format($item->nominal_dibayar) }}</td>
                                        <td class="d-flex">
                                            <a href="#" class="badge badge-success m-2">
                                                <span class="fa fa-edit text-light p-2"></span>
                                            </a>
                                            <form id="form-delete-{{ $item->id }}" method="POST" action="/data/pelanggan/{{ $item->id }}/delete">
                                                @csrf
                                                @method('delete')
                                                <button type="button" onclick="showAlert('form-delete-{{ $item->id }}')" class="badge badge-danger m-2 border-0">
                                                    <span class="fa fa-trash text-light p-2"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>



        <!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/data/pelanggan/create" method="POST">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama_pelanggan">*Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">*Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection