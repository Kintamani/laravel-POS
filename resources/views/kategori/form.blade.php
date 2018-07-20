<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="form-horizontal" data-toggle="validator" method="POST" >
        
        {!! csrf_field() !!} {!! method_field('POST') !!} 
        
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"></h3>
        </div>

        <div class="modal-body">
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="nama" class="col-md-3 control-label">Nama Produk</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-primary btn-save" type="submit">
            <i class="fa fa-floppy-o">Simpan</i>
          </button>
          <button class="btn btn-warning" type="button" data-dismiss="modal">
            <i class="fa fa-arrow-circle-left">Batal</i> 
          </button>
        </div>

      </form>
    </div>
  </div>
</div>