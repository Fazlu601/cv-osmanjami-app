@extends('layout.dashboard.main')

@section('main-content-dashboard')
        <!-- Content Row -->
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                  <li class="breadcrumb-item"><a href="/data/delivery">Data Pengiriman</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail Pengiriman</li>
                </ol>
              </nav>
            <!-- DataTales Example -->
            <div class="card shadow w-100 mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <div class="col-6">
                            <div class="table-responsive w-100">
                                <p class="text-dark font-weight-bold">*Data Pengiriman</p>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                   <tr>
                                        <th class="text-dark border-0">No PO</th>
                                        <td>{{ $data->Penjualan->no_po }}</td>
                                   </tr>
                                   <tr>
                                        <th class="text-dark border-0">No DO</th>
                                        <td>{{ $data->no_do }}</td>
                                   </tr>
                                   <tr>
                                        <th class="text-dark border-0">Tanggal Pengiriman</th>
                                        <td>{{ $data->tanggal_pengiriman }}</td>
                                   </tr>
                                   <tr>
                                        <th class="text-dark border-0">No Polisi</th>
                                        <td>{{ $data->no_pol }}</td>
                                   </tr>
                                   <tr>
                                        <th class="text-dark border-0">Nama Pelanggan</th>
                                        <td>{{ $data->Penjualan->Pelanggan->nama_pelanggan }}</td>
                                   </tr>
                                   <tr>
                                        <th class="text-dark border-0">Nama Barang</th>
                                        <td>{{ $data->Penjualan->Barang->nama_barang }}</td>
                                   </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="table-responsive w-100">
                                    <p class="text-dark font-weight-bold">*Data Volume</p>
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <tr>
                                            <th class="text-dark border-0">Panjang</th>
                                            <td>{{ $data->p }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-dark border-0">Lebar</th>
                                            <td>{{ $data->l }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-dark border-0">Tinggi</th>
                                            <td>{{ $data->t }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-dark border-0">QYT/M3</th>
                                            <td>{{ $data['qty/m3'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive w-100">
                                    <p class="text-dark font-weight-bold">*Rumus Sisa</p>
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        @php
                                            $jumlah = $data->p * $data->l * $data->t / 1000000;
                                            $sisa = $jumlah - $data['qty/m3'];
                                        @endphp
                                        <tr>
                                            <th class="text-dark border-0">JUMLAH</th>
                                            <th>{{ number_format($data->p * $data->l * $data->t / 1000000, 2, ',', '.') }}</th>
                                        </tr>
                                        <tr>
                                            <th class="text-dark border-0">SISA</th>
                                            <th>{{ number_format($sisa, 2, ',', '.') }}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>


@endsection