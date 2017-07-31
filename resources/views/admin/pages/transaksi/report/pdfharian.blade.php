<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Laporan Transaksi Harian</title>
        <body>
            <style type="text/css">
            body {
              font-family: "Open Sans", sans-serif;
              line-height: 1.25;
            }
            table {
              border-collapse: collapse;
              margin: 0;
              padding: 0;
              width: 100%;
              table-layout: fixed;
            }
            table caption {
              font-size: 1.5em;
              margin: .5em 0 .75em;
            }
            table tr {
              background: #fff;
              border: 1px solid #ddd;
              padding: .35em;
            }
            table tr:nth-child(even){background-color: #f2f2f2}
            table th,
            table td {
              padding: .625em;
              text-align: center;
            }
            table th {
              font-size: .85em;
              letter-spacing: .1em;
              text-transform: uppercase;
            }
            @media screen and (max-width: 600px) {
              table {
                border: 0;
              }
              table caption {
                font-size: 1.3em;
              }
              table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
              }
              table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
              }
              table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
              }
              table td:before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
              }
              table td:last-child {
                border-bottom: 0;
              }
             .small-info {
                font-size: 0.7rem;
              }
            }
            </style>
            <h1 align="center"><b>PT.GASINDO</b></h1>
            <h2 align="center">Laporan Transaksi Harian</h2>
            <p align="center">Alamat : JL. Pondok Indah <br>
            Telp/Fax : 08811331441/021 665411
            </p>
            <hr>
            <table>
              <thead>
                <tr>
                    <th align="center">Nama</th>
                    <th align="center">Produk</th>
                    <th align="center">Qty</th>
                    <th align="center">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $row)
                <tr>
                    <td align="center">{{$row->customer->name}}</td>
                    <td align="center">{{$row->produk->nama}}</td>
                    <td align="center">{{$row->qty}}</td>
                    <td align="center">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                </tr>
                @endforeach 
              </tbody>
            </table>
            <hr>
            <p class="small-info">*Laporan pada tanggal : {{date("d/m/Y h:i:s")}}</p>
        </body>
    </head>
</html>