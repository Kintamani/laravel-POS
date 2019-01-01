@extends('layouts.app')

@section('title')
    Edit Profil
@endsection

@section('breadcrumb')
    @parent
    <li>User</li>
    <li>Edit Profil</li>
@endsection

@section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <form class="form form-horizontal" data-togle="validator" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }} {{ method_field('PATCH') }}

            <div class="box-body">

              <div class="alert alert-info alert-dismissible" style="display: none">
                <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">
                  &times;
                </button>
                <i class="icon fa fa-check"></i>
                Perubahan Berhasil Disimpan.
              </div>

              {{-- foto profile --}}
              <div class="form-group">
                <label for="foto" class="col-md-2">Foto Profile </label>
                <div class="col-md-4">
                  <input type="file" id="foto" class="form-control" name="foto">
                  <br>
                  <div class="tampil-foto">
                    <img src="{{asset('images/'.Auth::user()->foto)}}" width="200">
                  </div>
                </div> 
              </div>

              {{--  password lama  --}}
              <div class="form-group">
                <label for="passwordlama" class="col-md-2" control-label>
                  Password Lama
                </label>
                <div class="col-md-6">
                  <input type="password" class="form-control" id="passwordlama" name="passwordlama"  required>
                  <span class="help-block with-errors"></span>
                </div>
              </div>

              {{--  password baru  --}}
              <div class="form-group">
                  <label for="password" class="col-md-2" control-label>
                    Password Baru
                  </label>
                  <div class="col-md-6">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="help-block with-errors"></span>
                  </div>
                </div>

              {{--  password ulang  --}}
              <div class="form-group">
                <label for="password1" class="col-md-2" control-label>
                  Ulang Password
                </label>
                <div class="col-md-6">
                  <input type="password" class="form-control" id="password1" name="password1" data-match="#password" required>
                  <span class="help-block with-errors"></span>
                </div>
              </div>
            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">
                <i class="fa fa-floppy-o"></i>
                Simpan Perubahan
              </button>
            </div>
          </form>
        
        </div>
      </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
  $(function(){
    //saat pasword lama diubah
    $('#passwordlama').keyup(function(){
      if($(this).val() != "") $('#password, #password1').attr('required', true);
      else $('#password, #password1').attr('required',false);
    });

    $('.form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        
        //upload file via ajax
        $.ajax({
          url         : "{{ Auth::user()->id }}"+"/change",
          type        : "POST",
          data        : new FormData($(".form")[0]),
          dataType    : 'JSON',
          async       : false,
          processData : false,
          contentType : false,
          success : function(data){
            //tampilkan pesan jika data msg=error
            if(data.msg == "error"){
              alert('Password Lama Salah !');
              $('#passwordlama').focus().select();
            }
            else{
              d = new Date();
              $('.alert').css('display','block').delay(2000).fadeOut();

              //update foto user
              $('.tampil-foto img , .user-image, .user-header img').attr('src', data.url+'?'+d.getTime());
            }
          },
          error : function(){
            alert("Tidak dapat menyimpan data!");
          }
        });
        return false;
      }
    });
  });
</script>
@endsection