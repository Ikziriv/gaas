
<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <form action="" method="post" class="form-horizontal" id="form-edit">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> # </h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <input type="hidden" class="form-control" id="e_id" name="e_id">
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" class="form-control" id="e_name" name="e_name">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="e_email" name="e_email">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea class="form-control" id="e_alamat" name="e_alamat" rows="4"></textarea>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Telephone</label>
            <input type="text" class="form-control" id="e_tlp" name="e_tlp">
          </div>
        </div>
        <div class="col-md-12 hide">
          <div class="form-group">
            <input type="checkbox" value="1" id="e_active" name="e_active" checked="true"> Aktif
          </div>
        </div>
        </div>
      </div>
      {{ csrf_field() }}
      <div class="modal-footer">
        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
          Edit
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Cancel
        </button>
      </div>
      </form>
    </div>

  </div>
</div>