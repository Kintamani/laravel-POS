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
          
          {{--  nama  --}}
          <div class="form-group">
            <label for="nama" class="col-md-3" control-label>
              Nama
            </label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama"  required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          {{--  alamat  --}}
          <div class="form-group">
            <label for="alamat" class="col-md-3" control-label>
              Alamat
            </label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="alamat" name="alamat"  required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          {{--  telpon  --}}
          <div class="form-group">
            <label for="telpon" class="col-md-3" control-label>
              Telpon
            </label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="telpon" name="telpon"  required>
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