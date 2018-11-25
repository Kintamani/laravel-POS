<div class="modal" id="modal-form" tabindex="-1" role="dialog"  aria-hidden="true" data-hidden="true" data-backdrop="static">
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

        <div class="modal-body">
          
          {{--  ID-Pengeluaran  --}}
          <input type="hidden" id="id" name="id">
          
          {{--  Jenis Pengeluaran  --}}
          <div class="form-group">
            <label for="jenis" class="col-md-3" control-label>Jenis Pengeluaran</label>
            <div class="col-md-6">
              <input type="text" id="jenis" class="form-control" name="jenis" autofocus required>
            </div>
          </div>
        
          {{--  Nominal  --}}
          <div class="form-group">
            <label for="nominal" class="col-md-3" control-label>Nominal</label>
            <div class="col-md-6">
            <input type="number" id="nominal" class="form-control" name="nominal" autofocus required>
            </div>
          </div>
          
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
