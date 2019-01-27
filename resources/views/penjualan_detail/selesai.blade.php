@extends('layouts.app')

@section('title')
    Selesai Transaksi
@endsection

@section('breadcrumb')
    @parent
    <li>Transaksi</li>
    <li>Selesai</li>
@endsection

@section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="box-body">
              <div class="alert alert-success alert-dismissible">
                <i class="icon fa fa-check"></i>
                Data Transaksi Telah Disimpan
              </div>

              <br><br>

              @if ($settting -> tipe_nota == 0)
                  <a href="{{ route('transaksi.cetak') }}" class="btn btn-warning btn-lg">
                    Cetak Ulang Nota
                  </a>                 
              @else                  
                  <a onclick="tampilNota()" class="btn btn-warning btn-lg">
                    Cetak Ulang Nota
                  </a>
                  <script type="text/javascript">
                    tampilNota();
                    function tampilNota(){
                      window.open("{{ route('transaksi.pdf') }}", "Nota PDF", "height=650, width=1024, left=150, scrollbars=yes");
                    }
                  </script>
              @endif

              <a href="{{ route('transaksi.new') }}" class="btn btn-primary btn-lg">
                Transaksi Baru
              </a>
              <br><br><br><br>
          </div>
        </div>
      </div>
    </div>
@endsection


@endsection
