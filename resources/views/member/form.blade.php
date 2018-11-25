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
          
          {{--  ID-Member  --}}
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="kode" class="col-md-3" control-label>Kode Member</label>
            <div class="col-md-6">
              <input type="number" id="kode" class="form-control" name="kode" autofocus required>
            </div>
          </div>
        
          {{--  Nama  --}}
          <div class="form-group">
            <label for="nama" class="col-md-3" control-label>Nama</label>
            <div class="col-md-6">
            <input type="text" id="nama" class="form-control" name="nama" autofocus required>
            </div>
          </div>

          {{--  Alamat  --}}
          <div class="form-group">
            <label for="alamat" class="col-md-3" control-label>Alamat</label>
            <div class="col-md-6">
              <input type="text" id="alamat" class="form-control" name="alamat" autofocus required>
            </div>
          </div>

          {{--  Telpon  --}}
          <div class="form-group">
            <label for="telpon" class="col-md-3" control-label>Telpon</label>
            <div class="col-md-6">
              <input type="text" id="telpon" class="form-control" name="telpon" autofocus required>
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
