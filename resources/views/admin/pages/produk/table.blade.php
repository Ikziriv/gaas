<table id="produk" class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Stock</th>
      <th style="width: 8.5em;">Tanggal</th>
    </tr>
  </thead>
  {{ csrf_field() }}
  <tbody>
    @foreach ($details as $key => $detail)
    <tr>
      <td>{{ $key +1 }}</td>
      <td>{{ $detail->p_nama }}</td>
      <td>{{ $detail->qty }}</td>
      <td>{{ $detail->created_at }}</td>
      {{-- End --}}
    </tr>
    @endforeach
  </tbody>
</table>
<div class="pull-right link">{!! $details->links() !!}</div>