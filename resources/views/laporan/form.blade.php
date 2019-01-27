<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form class="form-horizontal" data-toggle="validator" method="POST" action="laporan">
        {{ csrf_field() }}
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Periode Laporan</h4>
        </div>
        
        <div class="modal-body">
          {{--  tanggal awal  --}}
          <div class="form-group">
            <label for="awal" class="col-md-3" control-label>
              Tanggal Awal
            </label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="awal" name="awal"  required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          {{--  tanggal akhir  --}}
          <div class="form-group">
            <label for="akhir" class="col-md-3" control-label>
              Tanggal Akhir
            </label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="akhir" name="akhir"  required>
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