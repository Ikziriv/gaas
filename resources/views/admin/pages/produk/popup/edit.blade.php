<!-- Edit -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form action="" class="form-horizontal" id="form-edit" method="post" accept-charset="utf-8">
            <input type="hidden" class="form-control" id="id" name="id">
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
            </div>
            {{ csrf_field() }}
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
          <span id="footer_btn" class="fa fa-pencil"> </span>
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span id="footer_btn" class="fa fa-times"> </span>
        </button>
      </div>
    </div>

  </div>
</div>