@extends('layouts.app')

@section('title')
    Daftar Produk
@endsection

@section('breadcrumb')
    @parent
    <li>produk</li>
@endsection

@section('content')
    <div class="row">
      <div class="cl-xs-12">
        <div class="box">
          <div class="box-header">
            <a onclick="addForm()" class="btn btn-succerss"><i class="fa fa-plus-circle"></i></a>
            <a onclick="deleteAll()" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <a onclick="printBarcode()" class="btn btn-info"><i class="fa fa-barcode"></i></a>
          </div>

          <div class="box-body">
            <form method="POST" id="form-produk">
              {{ csrf_field() }}
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="20"><input type="checkbox" value="1" id="select-all"></th>
                    <th width="20">No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Merk</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Diskon</th>
                    <th>Stok</th>
                    <th width="100">Aksi</th>
                  </tr>
                </thead>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  @include('produk.form')
@endsection

@section('script')
<script type="text/javascript">
  var table, save_method;
  $($function())
  {
    //Menampilkan data dengan Plugin
    table = $('.table').DataTable({
      "processing" = true,
      "serverside" = true,
      "ajax" : {
        "url" : "{{ route('produk.data') }}",
        "type" : "GET"
      },
      'columnDefs' : [{
        'target' : 0,
        'searchable' : false,
        'orderable' : false,
      }],
      'order' : [1, 'asc']
    });

    //Centang semua checkbox ketika checkbox dengan id #select-all dicentang
    $('#select-all').click(function(){
      $('input[type="checkbox"]').prop('checked', this.checked);
    });
  }
</script>
    
@endsection




