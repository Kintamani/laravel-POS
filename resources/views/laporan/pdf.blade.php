<!DOCTYPE html>
<html>
<head>
  <title>Produk PDF</title>
  <style type="text/css">
      body {
        font-family: "Open Sans", sans-serif;
        line-height: 1.25;
      }
      
      table {
        border: 1px solid #ccc;
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
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
      }
      
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
        
        table td::before {
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
      }
  </style>
</head>

<body>
  <caption>
    <h2>Laporan Pendapatan</h2> 
  </caption>
  <h4>Tanggal {{ tanggal_indonesia($tanggal_awal) }} s/d {{ tanggal_indonesia($tanggal_akhir) }}</h4>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Penjualan</th>
        <th scope="col">Pembelian</th>
        <th scope="col">Pengeluaran</th>
        <th scope="col">Pendapatan</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($data as $row)
      <tr>
        @foreach ($row as $col)
        <td scope="row">{{ $col }}</td>
        @endforeach
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>