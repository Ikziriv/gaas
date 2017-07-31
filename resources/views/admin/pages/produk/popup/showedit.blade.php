<!-- Edit -->
<div id="showeditModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form class="form-horizontal" id="form-showedit" method="post" accept-charset="utf-8">
            <div class="col-md-12">
              <input type="hidden" class="form-control" id="e_id" name="id">
              <input type="hidden" class="form-control" id="e_produk_id" name="produk_id">
              <div class="form-group">
                <label for="exampleInputEmail1">Stock</label>
                <input type="number" class="form-control" id="e_qty" name="qty">
              </div>
            </div>
            {{ csrf_field() }}
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary showedit" data-dismiss="modal">
          <span id="footer_btn" class="fa fa-pencil"> </span>
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span id="footer_btn" class="fa fa-times"> </span>
        </button>
      </div>
    </div>

  </div>
</div>