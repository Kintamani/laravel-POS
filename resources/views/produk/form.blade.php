<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form class="form-horizontal" data-toggle="validator" method="POST">
        {{ csrf_field() }} {{ method_field('POST') }}
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title"></h4>
        </div>
        
        {{--  id  --}}
        <div class="modal-body">
          <input type="hidden" id="id" name="id">

          <div class="form-group">
            <label for="kode" class="col-md-3" control-label>
              Kode Produk
            </label>
            <div class="col-md-6">
              <input type="number" class="form-control" id="kode" name="kode" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div> 
          
          {{--  nama  --}}
          <div class="form-group">
            <label for="nama" class="col-md-3" control-label>
              Nama Produk
            </label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama"  required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          {{--  nama kategori  --}}
          <div class="form-group">
            <label for="kategori" class="col-md-3" control-label>
              Kategori
            </label>
            <div class="col-md-6">
              <select name="kategori" id="kategori" type="text" class="form-control" required>
                  <option value="">
                    --Pilih Kategori--
                  </option>
                @foreach ($kategori as $list)
                  <option value="{{ $list->id_kategori }}">
                    {{ $list->nama_kategori }}
                  </option>
                @endforeach
              </select>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          {{--  merk  --}}
          <div class="form-group">
            <label for="merk" class="col-md-3" control-label>
              Merk
            </label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="merk" name="merk"  required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          
          {{--  harga beli  --}}
          <div class="form-group">
              <label for="harga_beli" class="col-md-3" control-label>
                Harga Beli
              </label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="harga_beli" name="harga_beli"  required>
                <span class="help-block with-errors"></span>
              </div>
          </div>

          {{--  diskon  --}}
          <div class="form-group">
              <label for="diskon" class="col-md-3" control-label>
                Diskon
              </label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="diskon" name="diskon"  required>
                <span class="help-block with-errors"></span>
              </div>
          </div>

          {{--  harga jual  --}}
          <div class="form-group">
              <label for="harga_jual" class="col-md-3" control-label>
                Harga Jual
              </label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="harga_jual" name="harga_jual"  required>
                <span class="help-block with-errors"></span>
              </div>
          </div>

          {{--  stock  --}}
          <div class="form-group">
              <label for="stok" class="col-md-3" control-label>
                Stock
              </label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="stok" name="stok"  required>
                <span class="help-block with-errors"></span>
              </div>
          </div>
        </div>
        
        
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Back</button>
          <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Save</button>
        </div>
        
      </form>
    
    </div>
  </div>
</div>