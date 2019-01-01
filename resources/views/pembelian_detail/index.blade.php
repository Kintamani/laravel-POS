@extends('layouts.app')

@section('title')
    Transaksi Pembelian
@endsection

@section('breadcrumb')
    @parent
    <li>Pembelian</li>
    <li>Tambah</li>
@endsection

@section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="box-body">
            <table>
              <tr>
                <td width="150">Supplier : </td>
                <td> </td>
                <td><b>{{ $supplier -> nama}} </b></td>
                <td> </td>
                <td> Alamat : </td>
                <td> </td>
                <td><b> {{ $supplier -> alamat}} </b></td>
                <td> </td>
                <td> Telpon : </td>
                <td> </td>
                <td><b> {{ $supplier -> telpon}} </b></td>
              </tr>
            </table>
            <hr>  
              
            <form class="form form-horizontal form-produk" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="idpembelian" value="{{ $idpembelian }}">
              <div class="form-group">
                <label for="kode" class="col-md-2" control-label>
                  Kode Produk
                </label>  
                <div class="col-md-5">
                  <div class="input-group">
                    <input type="text" id="kode" class="form-control" name="kode" autofocus required>
                    <span class="input-group-btn">
                      <button onclick="showProduct()" type="button" class="btn btn-info">
                        ...
                      </button>
                    </span>
                  </div>
                </div>
              </div>
            </form> 
              
            <form class="form-keranjang">
              {{ csrf_field() }} {{ method_field('PATCH') }}
              <table class="table table-striped tabel-pembelian">
                <thead>
                    <tr>
                      <th width="30">No</th>
                      <th>Kode Produk</th>
                      <th>Nama Produk</th>
                      <th align="right">Harga</th>
                      <th>Jumlah</th>
                      <th align="right">Sub Total</th>
                      <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
              </table>
            </form>

            <div class="col-md-8">
              <div id="tampil-bayar" style="background: #dd4b39; color:#fff; font-size:80px; text-align: center; height:100px"></div>
              <div id="tampil-terbilang" style="background: #3c8dbc; color:#fff; font-weight:bold; padding:10px"><center></center></div>
            </div>
              
            <div class="col-md-4">
              <form action="{{ route('pembelian.store') }}" class="form form-horizontal form-pembelian" method="POST">
                {{ csrf_field() }}
                <input type="hiden" name="idpembelian" value="{{ $idpembelian }}">
                <input type="hiden" name="total" id="total">
                <input type="hiden" name="totalitem" id="totalitem">
                <input type="hiden" name="bayar" id="bayar"> 
                
                <div class="form-group">
                    <label for="totalrp" class="col-md-4 control-label">
                      Total
                    </label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" id="totalrp" name="totalrp" readonly>
                    </div>
                </div>  
                
                <div class="form-group">
                    <label for="diskon" class="col-md-4 control-label">
                      Diskon
                    </label>
                    <div class="col-md-8">
                      <input type="number" class="form-control" id="diskon" name="diskon" value="0">
                    </div>
                </div>  
                
                <div class="form-group">
                    <label for="bayarrp" class="col-md-4 control-label">
                      Bayar
                    </label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" id="bayarrp" name="bayarrp" readonly>
                    </div>
                </div>  
              
              </form> 
            </div>
          </div>
          <div class="box-footer">
            <button class="btn btn-primary pull-right simpan">
              <i class="fa fa-floppy-o"></i>
              Simpan Transaksi
            </button>
          </div>

        </div>
      </div>
    </div>
    @include('pembelian_detail.produk')
@endsection

@section('script')
    <script type="text/javascript">
      var table;

      $(function(){
        $('.table-produk').DataTable();

        table = $('.tabel-pembelian').DataTable({
          "dom"        : 'Brt',
          "bSort"      : false,
          "processing" : true,
          "ajax" : {
            "url" : "{{ route('pembelian_detail.data', $idpembelian) }}",
            "type" : "GET"
          }
        }).on('draw.dt', function(){
            loadForm($('#diskon').val());
      }); 
      
      //menghindari submit form saat dienter pada kode produk dan jumlah
      $('.form-produk').on('submit', function(){
        return false;
      });

      $('.form-keranjang').submit('submit', function(){
        return false;
      });

      //process ketika kode produk atau diskon dirubah
      $('#kode').change(function(){
        addItem();
      });

      $('#diskon').change(function(){
        if($(this).val() ==  "") $(this).val(0).select();
        loadForm($(this).val());
      });

      //Menyimpan form transaksi saat tombol simpan di klik
      $('.simpan').click(function(){
        $('.form-pembelian').submit();
      });
    });

    function addItem(){
      $.ajax({
        url       : '{{ route('pembelian_detail.store') }}',
        type      : "POST",
        data      : $('.form-produk').serialize(),
        success   : function(data){
          $('#kode').val('').focus();
          table.ajax.reload(function(){
            loadForm($('#diskon').val());
          });
        },
        error     : function(){
          alert("Tidak dapat menyimpan Data!")
        }
      });
    }  

    function selectItem(data){
      $('#kode').val(data);
      $('#modal-produk').modal('hide');
      addItem();
    }

    function changeCount(id){
      $.ajax({
        url       :  "pembelian_detail/"+id,
        type      :  "POST",
        data      : $('.form-keranjang').serialize(),
        success   : function(data){
          $('#kode').val('').focus();
          table.ajax.reload(function(){
            loadForm($('#diskon').val());
          });
        },
        error     : function(){
          alert("Tidak dapet menyimpan Data!")
        }
      });
    }  

    function showProduct(){
      $('#modal-produk').modal('show');
    }

    function deleteItem(id){
      if(confirm("Apakah anda yakin data akan dihapus ?")){
        $.ajax({
          url : "pembelian_detail/"+id,
          type : "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[ name= csrf-token]').attr('content')
          },
          data : {'_method' : 'DELETE', '_token' :
           $('meta[ name = csrf-token]').attr('content')
          },
          //salah
          success : function(data){
            table.ajax.reload(function(){
              loadForm($('#diskon').val());
            });
          },
          error : function(){
            alert("Tidak dapat menghapus data !");
          }
        });
      }
    }

    function loadForm(diskon = 0){
      $('#total').val($('.total').text());
      $('#totalitem').val($('.totalitem').text());

      $.ajax({
        url       :  "pembelian_detail/loadform/"+diskon+"/"+$('.total').text(),
        type      :  "GET",
        dataType  :  "JSON",
        success   : function(data){
          $('#totalrp').val("Rp. "+data.totalrp);
          $('#bayarrp').val("Rp. "+data.bayarrp);
          $('#bayar').val(data.bayar);
          $('#tampil-bayar').text("Rp. "+data.bayarrp);
          $('#tampil-terbilang').text(data.terbilang);
        },
        error     : function(){
          alert("Tidak dapat menampilkan Data!")
        }
      });
    }

    </script>
@endsection
