@extends('layouts.app')

@section('title')
    Daftar Penjualan
@endsection

@section('breadcrumb')
    @parent
    <li>Penjualan</li>
@endsection

@section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="box-body">
              <table class="table table-striped tabel-penjualan">
                <thead>
                  <tr>
                    <th width="20">No</th>
                    <th>Tanggal</th>
                    <th>Kode Member</th>
                    <th>Total Item</th>
                    <th>Total Harga</th>
                    <th>Diskon</th>
                    <th>Total Bayar</th>
                    <th>Kasir</th>
                    <th width="100">Aksi</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    @include('penjualan.detail')
@endsection

@section('script')
    <script type="text/javascript">
      
      var tabel, save_method, tabel1;

      $(function(){
        tabel = $('.tabel-penjualan').DataTable({
          "processing" : true,
          "serverside" : true,
          "ajax" : {
            "url" : "{{ route('penjualan.data') }}",
            "type" : "GET"
          }
        });

      tabel1 = $('.tabel-detail').DataTable({
        "dom"         : 'Brt',
        "bSort"       : false,
        "processing"  : true
      });
      
      $('.tabel-supplier').DataTable();
        
    });

    function addForm(){
      $('#modal-supplier').modal('show');
    }  

    function showDetail(id){
      $('#modal-detail').modal('show');

      tabel1.ajax.url("penjualan/"+id+"/lihat");
      tabel1.ajax.reload();
    }

    function deleteData(id){
      if(confirm("Apakah anda yakin data akan dihapus ?")){
        $.ajax({
          url : "penjualan/"+id,
          type : "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
          },
          data : {'_method' : 'DELETE', '_token' :
           $('meta[ name = csrf-token]').attr('content')
          },
          //salah
          success : function(data){
            tabel.ajax.reload();
          },
          error : function(){
            alert("Tidak dapat menghapus data !");
          }
        });
      }
    }

    </script>
@endsection
