
<!-- Modal -->
<div id="show-form-completed" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">

	  <form action="/" method="POST" class="form-horizontal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">List Completed Form</h4>
      </div>
      <div class="modal-body">
      <table class="table table-hover" id="completed">
        <thead>
          <tr>
            <th>#</th>
            <th>Status</th>
            <th>Nama</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Produk</th>
            <th>Qty</th>
            <th>Cash</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transaksis_completed as $key => $transaksi)
          <tr>
            <td>{{ $key +1 }}</td>
            @if($transaksi->stat == 4)
            <td><span class="label label-success">Completed</span></td>
            @endif
            <td>{{ $transaksi->cname }}</td>
            <td>{{ $transaksi->ctlp}}</td>
            <td>{{ $transaksi->calamat}}</td>
            <td>{{ $transaksi->pname}}</td>
            <td><span class="badge">{{ $transaksi->qty}}</span></td>
            <td>Rp.{{ number_format($transaksi->bayar)}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>