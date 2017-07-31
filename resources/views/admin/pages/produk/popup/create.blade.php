<!-- Modal Create -->
<div id="createModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form class="form-horizontal" id="form-create" method="post" accept-charset="utf-8">
            <div class="col-md-12">
              <input type="hidden" class="form-control" id="produk_id" disabled>
              <div class="form-group">
                <label for="exampleInputEmail1">Stock</label>
                <input type="number" class="form-control" id="qty" name="qty" min="1" max="99" required onkeypress="return isNumber(event)">
              </div>
            </div>
            {{ csrf_field() }}
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary create" data-dismiss="modal">
          <span id="footer_btn" class="fa fa-plus"> </span>
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span id="footer_btn" class="fa fa-times"> </span>
        </button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>