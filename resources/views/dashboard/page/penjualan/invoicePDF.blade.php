<!-- File: resources/views/kwitansi.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
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
        }
        .title > h2 {
            padding-bottom: 5px;
            text-align: right;
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
        <div class="title">
            <h2>INVOICE</h1>
        </div>
        <div>
            <div class="row">
                <div style="width:40%;float:left;margin-right:70px;">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <th style="text-align: left;">BILL TO</th>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">{{ $data->Pelanggan->nama_pelanggan }}</td>
                            </tr>
                            <tr>
                                <td>{{ $data->Pelanggan->alamat }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div style="width:50%;float:left;">
                    <div>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
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
                           </tr>
                        </table>
                    </div>
                </div>
                <div style="clear:left;"></div>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-dark text-light">
                 <tr style="text-align: center">
                     <th class="border">DESCRIPTION</th>
                     <th class="border">UNIT PRICE</th>
                     <th class="border">QYT/M3</th>
                     <th class="border">AMOUNT</th>
                 </tr>
                </thead>
                <tbody>
                 <tr>
                     <td class="border" style="text-align: center">{{ $data->Barang->nama_barang }}</td>
                     <td class="border" style="text-align: center">Rp. {{ number_format($data->Barang['harga/qty'] )}}</td>
                     <td class="border" style="text-align: center">{{ $data->qty }}</td>
                     <td class="border" style="text-align: center">Rp. {{ number_format($data->total )}}</td>
                 </tr>
                 <tr>
                     <td class="border" style="text-align: right;" colspan="3">SUB TOTAL</td>
                     <td class="border" style="text-align: center">Rp. {{ number_format($data->total )}}</td>
                 </tr>
                 <tr>
                     <td class="border" style="text-align: right;font-weight: bold;" colspan="3">TOTAL</td>
                     <td class="border" style="text-align: center;font-weight: bold;">Rp. {{ number_format($data->total )}}</td>
                 </tr>
                </tbody>
             </table>
        </div>
        <div class="row" style="width:50%;">
            <table class="table" style="border:1px solid black;">
                <tr>
                    <th style="text-align: left;background-color:#6c757d;">NOTES ;</th>
                </tr>
                <tr>
                    <td>Pembayaran bisa di Transfer Ke rekening </td>
                </tr>
                <tr>
                    <td>Bank Mandiri</td>
                </tr>
                <tr>
                    <td>No Rek : 11 000 1740 250 1</td>
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
