@extends('layout.dashboard.main')

@section('main-content-dashboard')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>
        <!-- Content Row -->
        <div class="row">
            <!-- DataTales Example -->
            <div class="card shadow w-100 mb-4">
                <div class="card-header py-3">
                    <button class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Tambah Data Baru</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Pelanggan</th>
                                        <th>Barang</th>
                                        <th>No.PO</th>
                                        <th>No.INV</th>
                                        <th>QTY</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sumQty = 0;
                                        $sumTotal = 0;
                                    @endphp
                                    @foreach ($data_penjualan as $item)
                                        @php
                                            $sumQty += $item->qty;
                                            $sumTotal += $item->total;
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->Pelanggan->nama_pelanggan }}</td>
                                            <td>{{ $item->Barang->nama_barang }}</td>
                                            <td>{{ $item->no_po }}</td>
                                            <td>{{ $item->no_inv }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Rp. {{ number_format($item->total) }}</td>
                                            <td class="d-flex">
                                                <a href="/data/penjualan/{{ $item->id }}/show" class="badge badge-warning m-2">
                                                    <span class="fa fa-info text-light p-2"></span>
                                                </a>
                                                <form id="form-delete-{{ $item->id }}" method="POST" action="/data/penjualan/{{ $item->id }}/delete">
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
                    <div class="row">
                        <div class="table-responsive col-4">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>QTY</th>
                                        <th>TOTAL TAGIHAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $sumQty }}</td>
                                        <td>Rp. {{ number_format($sumTotal )}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Penjualan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/data/penjualan/create" method="POST">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-3">
                    <label for="tanggal">*Tanggal</label>
                    <input type="date" name="tanggal" value="{{ Date("Y-m-d") }}" id="tanggal" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="nama_pelanggan">*Nama Pelanggan</label>
                    <select name="pelanggan_id" id="nama_pelanggan" class="form-control">
                        <option value="" disabled selected>--Pilih--</option>
                        @foreach ($data_pelanggan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_pelanggan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="nama_barang">*Barang</label>
                    <select name="barang_id" id="barang_id" class="form-control">
                        <option value="" disabled selected>--Pilih--</option>
                        @foreach ($data_barang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="no_po">*No. PO</label>
                    <input type="text" name="no_po" id="no_po" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="qty">*QTY</label>
                    <input type="number" min="1" name="qty" step="0.1" id="qty" class="form-control">
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