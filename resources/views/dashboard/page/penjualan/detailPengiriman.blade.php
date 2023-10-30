@extends('layout.dashboard.main')

@section('main-content-dashboard')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
              <li class="breadcrumb-item"><a href="/data/penjualan">Data Penjualan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Penjualan</li>
            </ol>
          </nav>
        <!-- DataTales Example -->
        <div class="card shadow w-100 mb-4">
            <div class="card-header py-3">
                <a href="/data/penjualan/edit/{{ $data_penjualan->id }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2"><i class="fas fa-edit fa-sm text-white-50"></i> Edit Data<a>
                <a href="/data/penjualan/{{ $data_penjualan->id }}/generate-pdf" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate PDF<a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <img src="{{ asset('image/logo.jpg') }}" class="img-fluid" alt="logo">
                        </div>
                        <div class="col-10 row p-3">
                            <h5 class="font-weight-bold">CV OSMAN JAYA MINERAL</h5>
                            <p>Sungai Gedang, Kel. Sungaigedang, Kec. Singkut, Kab. Sarolangun, Jambi, 37482</p>
                        </div>
                        <div class="col-10 row p-3">
                            <table class="table">
                                <tr>
                                    <th class="bg-dark text-light">BILL TO</th>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">{{ $data_penjualan->Pelanggan->nama_pelanggan }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_penjualan->Pelanggan->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="table-responsive mb-3 w-100">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <tr>
                                     <th class="bg-dark text-light">DATE</th>
                                     <td>{{ $data_penjualan->tanggal }}</td>
                                </tr>
                               <tr>
                                    <th class="bg-dark text-light">PO NUMBER</th>
                                    <td>{{ $data_penjualan->no_po }}</td>
                               </tr>
                               <tr>
                                    <th class="bg-dark text-light">PO INVOICE</th>
                                    <td>{{ $data_penjualan->no_po }}</td>
                               </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive mb-3 w-100">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                               <thead class="bg-dark text-light">
                                <tr align="center">
                                    <th>DESCRIPTION</th>
                                    <th>UNIT PRICE</th>
                                    <th>QYT/M3</th>
                                    <th>AMOUNT</th>
                                </tr>
                               </thead>
                               <tbody>
                                <tr align="center">
                                    <td>{{ $data_penjualan->Barang->nama_barang }}</td>
                                    <td>Rp. {{ number_format($data_penjualan->Barang['harga/qty'] )}}</td>
                                    <td>{{ $data_penjualan->qty }}</td>
                                    <td>Rp. {{ number_format($data_penjualan->total )}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" align="right" colspan="3">SUB TOTAL</td>
                                    <td align="center">Rp. {{ number_format($data_penjualan->total )}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" align="right" colspan="3">TOTAL</td>
                                    <td class="font-weight-bold" align="center">Rp. {{ number_format($data_penjualan->total )}}</td>
                                </tr>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="card shadow w-100 mb-4">
            <div class="card-header py-3">
                <button class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">Tambah Data Pengiriman</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Pengiriman</th>
                                <th>No. PO</th>
                                <th>No. DO</th>
                                <th>NOPOL</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pengiriman as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->Barang->nama_barang }}</td>
                                    <td>{{ $item->tanggal_pengiriman }}</td>
                                    <td>{{ $item->no_po }}</td>
                                    <td>{{ $item->no_do }}</td>
                                    <td>{{ $item->no_pol }}</td>
                                    <td>
                                        <a href="/data/delivery/{{ $item->id }}/show" class="btn btn-sm w-100 btn-primary">
                                            <span class="fa fa-info"></span>
                                        </a>
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pengiriman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/data/delivery/create" method="POST">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label class="text-danger" for="invoice_id">*NO INV</label>
                            <input type="hidden" name="invoice_id" value="{{ $data_penjualan->id }}">
                            <input type="text" value="{{ $data_penjualan->no_inv }}" disabled id="invoice_id" class="form-control"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-danger" for="nama_pelanggan">*Nama Pelanggan</label>
                            <input type="hidden" name="pelanggan_id" value="{{ $data_penjualan->Pelanggan->id }}">
                            <input type="text" disabled value="{{ $data_penjualan->Pelanggan->nama_pelanggan }}" id="nama_pelanggan" placeholder="{{ $data_penjualan->Pelanggan->nama_pelanggan }}" class="form-control" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label class="text-danger" for="invoice_id">*NO PO</label>
                            <input type="text" disabled value="{{ $data_penjualan->no_po }}" id="invoice_id" class="form-control"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-danger" for="barang_id">*Barang</label>
                            <input type="hidden" name="barang_id" value="{{ $data_penjualan->Barang->id }}">
                            <input type="text" value="{{ $data_penjualan->Barang->nama_barang }}" id="barang_id" disabled class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label class="text-danger" for="tanggal">*Tanggal Pengiriman</label>
                            <input type="date" name="tanggal" required value="{{ Date("Y-m-d") }}" id="tanggal" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label class="text-danger" for="no_po">*NO. DO</label>
                            <input type="text" name="no_do" required placeholder="Masukan No. DO" id="no_po" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label class="text-danger" for="no_pol">*NO. POL</label>
                            <input type="text" name="no_pol" required placeholder="Masukan No. POL" id="no_pol" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group mb-3">
                            <label class="text-danger" for="p">*P</label>
                            <input type="number" min="1" name="p" required placeholder="Panjang" step="0.1" id="p" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group mb-3">
                            <label class="text-danger" for="l">*L</label>
                            <input type="number" min="1" name="l" required placeholder="Lebar" step="0.1" id="l" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group mb-3">
                            <label class="text-danger" for="t">*T</label>
                            <input type="number" min="1" name="t" required placeholder="Tinggi" step="0.1" id="t" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group mb-3">
                            <label class="text-danger" for="qty">*QTY/M3</label>
                            <input type="number" min="1" required placeholder="Masukan QTY/M3" name="qty/m3" step="0.1" id="qty" class="form-control">
                        </div>
                    </div>
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