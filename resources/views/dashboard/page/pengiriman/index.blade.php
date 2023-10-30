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
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-dark text-light">
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
                                @foreach ($data as $item)
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


@endsection