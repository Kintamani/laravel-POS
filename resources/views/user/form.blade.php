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
              Nama User
            </label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama"  required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          {{--  email  --}}
          <div class="form-group">
            <label for="email" class="col-md-3" control-label>
              Email
            </label>
            <div class="col-md-6">
              <input type="email" class="form-control" id="email" name="email"  required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          {{--  password  --}}
          <div class="form-group">
            <label for="password" class="col-md-3" control-label>
              Password
            </label>
            <div class="col-md-6">
              <input type="password" class="form-control" id="password" name="password"  required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          {{--  ulangi password  --}}
          <div class="form-group">
            <label for="password1" class="col-md-3" control-label>
              Ulangi Password
            </label>
            <div class="col-md-6">
              <input type="password" class="form-control" id="password1" name="password1"  data-match="#password" required>
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