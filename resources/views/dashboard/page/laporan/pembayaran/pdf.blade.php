<!-- File: resources/views/kwitansi.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 20px auto;
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th.border, td.border {
            border: 1px solid #000;
            padding: 5px;
        }
        th {
            text-align: center;
            background-color:#264653 ;
            color:#FFFFFF ;
            padding: 5px;
        }
        td {
            text-align: left;
            padding: 8px;
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo img {
            max-width: 100px;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
        }
        .title-header {
            text-align: center;
        }
        .title-header > h2 {
            padding-bottom: 3px;
            border-bottom:2px solid black;
        }
        .title-header > p {
            font-size: 12px;
            margin-top: -12px;
            margin-bottom: 30px;
        }
        .title > h2 {
            padding-bottom: 5px;
            text-align: left;
        }
        .row {
            display: flex;
            margin-bottom: 10px;
        }
        .col-6 {
            widows: 50%;
        }
        .col-10 {
            widows: 80%%;
        }
        .amount {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            margin-bottom: 30px;
        }
        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title-header">
            <h2>CV OSMAN JAYA MINERAL</h2>
            <p>Sungai Gedang, Kel. Sungaigedang, Kec. Singkut, Kab. Sarolangun, Jambi, 37482</p>
        </div>
        <div>
            <div class="row">
                <div style="width:40%;float:left;margin-right:70px;">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <th style="text-align: left;">REPORT PAYMENT</th>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">{{ $data_pelanggan->nama_pelanggan }}</td>
                            </tr>
                            <tr>
                                <td>{{ $data_pelanggan->alamat }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div style="width:50%;float:left;">
                    <div>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            {{-- <tr>
                                 <td>DATE</td>
                                 <td class="border">{{ $data->tanggal }}</td>
                            </tr>
                           <tr>
                                <td>PO NUMBER</td>
                                <td class="border">{{ $data->no_po }}</td>
                           </tr>
                           <tr>
                                <td>PO INVOICE</td>
                                <td class="border">{{ $data->no_po }}</td>
                           </tr> --}}
                        </table>
                    </div>
                </div>
                <div style="clear:left;"></div>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark text-light">
                 <tr>
                     <th class="border">NO.</th>
                     <th class="border">PAYMENT DATE</th>
                     <th class="border">AMOUNT</th>
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
                            <td class="border">{{ $loop->iteration }}</td>
                            <td class="border">{{ $items->tanggal_dibayar }}</td>
                            <td class="border">Rp. {{ number_format($items->nominal_dibayar )}}</td>
                        </tr>
                    @endforeach
                </tbody>
             </table>
        </div>
        <div class="row" style="width:100%;">
            <table class="table" style="width:50%;margin: 10px auto;">
                <tr >
                    <td style="font-weight: bold;">QTY</td>
                    <td class="border">{{ $total_qty_penjualan }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">TOTAL TAGIHAN</td>
                    <td class="border">Rp. {{ number_format($total_nominal) }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">TOTAL PEMBAYARAN</td>
                    <td class="border">Rp. {{ number_format($sumPembayaran) }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">SISA PEMBAYARAN</td>
                    <td class="border">Rp. {{ number_format($total_nominal - $sumPembayaran) }}</td>
                </tr>
            </table>
        </div>
        <div class="row" style="text-align: center;margin-top:50px;">
            <p>HORMAT KAMI <br> <b>CV OSMAN JAYA MINERAL</b></p>
            <div class="box" style="height:60px">

            </div>
            <p><b><u>SAMANSYAH</u></b></p>
        </div>
    </div>
</body>
</html>
