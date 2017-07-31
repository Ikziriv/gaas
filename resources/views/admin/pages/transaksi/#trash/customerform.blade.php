

    <div class="col-md-6">

      <div class="panel panel-default">
      <div class="panel-heading">Create Customer</div>
      <div class="panel-body">

        <form class="form-horizontal" method="POST" action="">
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ex: John Doe" >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ex: jhon@doe.com" >
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
            <label for="exampleInputEmail1">Telephone</label>
            <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Ex: 08xxxxxx" >
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <input type="checkbox" value="1" id="active" name="active"> Active
          </div>
        </div>
        {{ csrf_field() }}
        <div class="col-md-12">
          <div class="modal-footer">
            <div class="form-group pull-right">
              <button class="btn btn-primary create" type="but">Save</button>
            </div>
          </div>
        </div>

        </form>

      </div>
      </div>
    </div>