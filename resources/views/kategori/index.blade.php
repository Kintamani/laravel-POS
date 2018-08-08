@extends('layouts.app')
@section('title')
    Daftar Kategori
@endsection

@section('breadcrumb')
    @parent
    <li>kategori</li>
@endsection

{{--  @section('script')
  <script type="text/javascript">
  </script>
@endsection   --}}

@section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a onclick="addForm()" class="btn btn-success">
              <i class="fa fa-plus-circle"></i>
               Tambah
            </a>
          </div>

          <div class="box-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="30">No</th>
                  <th>Nama Kategori</th>
                  <th width="100">Aksi</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    @include('kategori.form')
@endsection

@section('script')
  <script type="text/javascript">
      var table, save_method;
      
       
      $(function(){
        //menampilkan data dengan plugin DataTable
        table = $('.table').DataTable({
          processing : true,
          ajax:{
            url : "{{ route('kategori.data') }}",
            type : "GET"
          }
        });

      //menyimpan data form tambah / edit beserta validasinya
      $('#modal-form form').validator().on('submit',function(e){
        if(!e.isDefaultPrevented()){
          var id = $('#id').val();
          if(save_method == "add") url="{{route('kategori.store')}}";
        
          else url = "kategori/"+id;

          $.ajax({
            url : url,
            type : "POST",
            data : $('#modal-form form').serialize(),
            headers: {
              'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
            },
            success : function(data){
              $('#modal-form').modal('hide');
              table.ajax.reload();
            },
            error :function(){
              alert("Tidak dapat menyimpan data !");
            }
        });
          return false;
      }
        });
      });
    

      //menapilkan form tambah
      function addForm(){
        save_method = "add";
        $('input[name = _method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Kategori');
      }

      //menampilkan form edit dan menampilkan data pada form tersebut
      function editForm(id){
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        
        $.ajax({
          url : "kategori/"+id+"/edit",
          type : "GET",
          dataType : "JSON", 
          
          success: function(data){
            
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Karakter');
            $('#id').val(data.id_kategori);
            $('#nama').val(data.nama_kategori);
            
          },
          error: function(){
            alert("Tidak dapet menampilkan data");
          }
        });
      }

      //menghapusa data
      function deleteData(id){
        if(confirm("Apakah yakin data akan dihapus ?")){
          $.ajax({
            url : "kategori/"+id,
            type : "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
            },
            data : {'_method' : 'DELETE', '_token':
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