@extends('layout.dashboard.main')

@section('main-content-dashboard')
        <div class="row w-100">
            <div class="card shadow w-100 p-0 mb-4">
                <div class="card-header">
                    <h5 class="font-weight-bold text-dark">FILTER DATA</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form method="GET" class="w-100">
                            @csrf
                            <div class="form-group d-flex col-6">
                                <aside>
                                    <label for="pelanggan_search" class="p-2 text-danger font-weight-bold" style="font-size: 12px;">*CARI NAMA PELANGGAN</label>
                                </aside>
                                <aside>
                                    <select name="pelanggan_search" id="pelanggan_search" class="form-control rounded-0">
                                        <option value="" disabled selected>--Pilih Pelanggan--</option>
                                        @foreach ($data_pelanggan as $items)
                                            <option value="{{ $items->id }}">{{ $items->nama_pelanggan }}</option>
                                        @endforeach
                                    </select>
                                </aside>
                                <aside>
                                    <button type="submit" class="btn btn-dark rounded-0">Filter</button>
                                </aside>
                            </div>
                        </form>
                    </div>
                    @if (isset($data_pembayaran))
                        <div class="row p-3">
                            <a href="{{ route('laporanPembayaran.pdf.generate', ['pelangganID' => request('pelanggan_search')]) }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row w-100 d-flex justify-content-between">
            <!-- DataTales Example -->
            <div class="card shadow w-100 p-0 mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    @if (isset($data_pembayaran))
                        <div class="row d-flex">
                            <div class="col-6">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="bg-dark text-light">
                                        <tr align="center" class="bg-dark text-light">
                                            <th>NO.</th>
                                            <th>TANGGAL</th>
                                            <th>JUMLAH DIBAYAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sumPembayaran= 0;
                                        @endphp
                                        @foreach ( $data_pembayaran as $items )     
                                            @php
                                                $sumPembayaran += $items->nominal_dibayar;
                                            @endphp     
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $items->tanggal_dibayar }}</td>
                                                <td>Rp. {{ number_format($items->nominal_dibayar) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <p class="text-dark font-weight-bold">*Total Tagihan</p>
                                <div class="table-responsive w-100">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                            <tr >
                                                <th class="text-dark border-0">QTY</th>
                                                <td>{{ $total_qty_penjualan }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-dark border-0">TOTAL TAGIHAN</th>
                                                <td>Rp. {{ number_format($total_nominal) }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-success border-0">TOTAL PEMBAYARAN</th>
                                                <td class="text-success font-weight-bold text-left">Rp. {{ number_format($sumPembayaran) }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-danger border-0">SISA PEMBAYARAN</th>
                                                <td class="text-danger font-weight-bold">Rp. {{ number_format($total_nominal - $sumPembayaran) }}</td>
                                            </tr>
                                        </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row d-block">
                            <p class="font-weight-bold text-center text-dark">TIDAK ADA DATA LAPORAN!</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>

@endsection