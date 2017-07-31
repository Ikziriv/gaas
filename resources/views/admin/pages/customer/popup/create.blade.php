
<!-- Modal -->
<div id="createModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	  <form action="" method="post" class="form-horizontal" id="form-create">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> # </h4>
      </div>
      <div class="modal-body">
      <div class="row">
      	<div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ex: John Doe" >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Telephone</label>
            <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Ex: 08xxxxxx" >
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="4" ></textarea>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ex: jhon@doe.com" >
          </div>
        </div>
        <div class="col-md-12 hide">
          <div class="form-group">
            <input type="checkbox" value="1" id="active" name="active" checked="true"> Aktif
          </div>
        </div>
      </div>
      </div>
      {{ csrf_field() }}
      <div class="modal-footer">
        <button type="button" class="btn btn-primary create" data-dismiss="modal">
          Save
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Cancel
        </button>
      </div>
      </form>
    </div>

  </div>
</div>