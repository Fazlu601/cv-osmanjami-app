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
                                    <label for="po_search" class="p-2 text-danger font-weight-bold" style="font-size: 12px;">*CARI NOMOR PO</label>
                                </aside>
                                <aside>
                                    <select name="po_search" id="po_search" class="form-control rounded-0">
                                        <option value="" disabled selected>--Pilih Nomor PO--</option>
                                        @foreach ($data_penjualan as $items)
                                            <option value="{{ $items->no_po }}">{{ $items->no_po }}</option>
                                        @endforeach
                                    </select>
                                </aside>
                                <aside>
                                    <button type="submit" class="btn btn-dark rounded-0">Filter</button>
                                </aside>
                            </div>
                        </form>
                    </div>
                    @if (isset($data_pengiriman))
                        <div class="row p-3">
                            <a href="{{ route('laporanPengiriman.pdf.generate', ['no_po' => request('po_search')]) }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
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
                    @if (isset($data_pengiriman))
                        <div class="row d-flex">
                            <div class="col-7">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="bg-dark text-light">
                                        <tr align="center" class="bg-dark text-light">
                                            <th>NO.</th>
                                            <th>TANGGAL PENGIRIMAN</th>
                                            <th>QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sumQty = 0;
                                            @endphp
                                        @foreach ( $data_pengiriman as $items )     
                                        @php
                                                $carbonDate = \Carbon\Carbon::parse($items->tanggal_pengiriman);
                                                $sumQty += $items->total_qty;
                                            @endphp     
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $carbonDate->format('d F Y'); }}</td>
                                                <td>{{ $items->total_qty }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-5">
                                <p class="text-dark font-weight-bold">*Jumlah Total QTY</p>
                                <div class="table-responsive w-100">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                            <tr >
                                                <td class="text-dark border-0">TOTAL QTY</td>
                                                <td class="font-weight-bold">{{ $total_qty_penjualan }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-success border-0">QTY TELAH DIKIRIM</td>
                                                <td class="text-success font-weight-bold">{{ $sumQty }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-danger border-0">SISA QTY</td>
                                                <td class="text-danger font-weight-bold">{{ $total_qty_penjualan - $sumQty }}</td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="row d-block">
                        <p class="text-center font-weight-bold">TIDAK ADA DATA PENGIRIMAN!</p>
                    </div>
                    @endif
                </div>
            </div>

            

@endsection