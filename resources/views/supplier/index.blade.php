@extends('layouts.app')

@section('title')
    Daftar Supplier
@endsection

@section('breadcrumb')
    @parent
    <li>Supplier</li>
@endsection

@section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
          </div>
          <div class="box-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="30">No</th>
                  <th>Nama Supplier</th>
                  <th>Alamat</th>
                  <th>Telpon</th>
                  <th width="100">Aksi</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @include('supplier.form')
@endsection
@section('script')
  <script type="text/javascript">

    var table, save_method;
    $(function() {
      //Menampilkan data dengan Plugin
      table = $('.table').DataTable({
        "processing" : true,
        "ajax" : {
          "url" : "{{ route('supplier.data') }}",
          "type" : "GET"
        }
      });

      //validation 
      $('#modal-form form').validator().on('submit', function(e){
        if(!e.isDefaultPrevented()){
          var id = $('#id').val();
          if(save_method == "add") url = "{{ route('supplier.store') }}";
          else url = "supplier/"+id;

          $.ajax ({
            url : url,
            type : "POST",
            data : $('#modal-form form').serialize(),
            success : function(data){
                $('#modal-form').modal('hide');
                table.ajax.reload();
            },
            error : function(){
              alert("Tidak dapat meyimpan data");
            }
          });
          return false;
        }
      });
    });

    //Menampilkan Form tambah data
    function addForm(){
      save_method = "add";
      $('input[name = _method]').val('POST');
      $('#modal-form').modal('show');
      $('#modal-form form')[0].reset();
      $('.modal-title').text('Tambah Supplier');
    }

    //Menampilkan Form edit data
    function editForm(id){
      save_method = "edit";
      $('input[name=_method]').val('PATCH');
      $('#modal-form form')[0].reset();
          
      $.ajax({
        url : "supplier/"+id+"/edit",
        type : "GET",
        dataType : "JSON",   

        success: function(data){
          $('#modal-form').modal('show');
          $('.modal-title').text('Edit Supplier');

          $('#id').val(data.id_supplier);
          $('#nama').val(data.nama);
          $('#alamat').val(data.alamat);
          $('#telpon').val(data.telpon);
        },
        error: function(){
          alert("Tidak dapet menampilkan data");
        }
      });
    }

    //Menghapus data
    function deleteData(id){
      if(confirm("Apakah anda yakin data akan dihapus ?")){
        $.ajax({
          url : "supplier/"+id,
          type : "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
          },
          data : {'_method' : 'DELETE', '_token' :
          $('meta[ name = csrf-token]').attr('content')},
          //salah
          success : function(data){
            table.ajax.reload();
          },
          error:function(){
            alert("Tidak dapat menghapus data !");
            //table.ajax.reload();
          }
        });
      }
    }
</script>

@endsection