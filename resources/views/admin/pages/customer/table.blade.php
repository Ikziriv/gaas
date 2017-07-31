<table id="customer" class="table">
  <thead>
    <tr>
      <th>#</th>
<!--       <th>Status</th> -->
      <th>Nama</th>
      <th>Telphone</th>
      <th>Invoice</th>
<!--       <th>Aktif</th> -->
      <th></th>
      <th style="width: 3.5em;"></th>
    </tr>
  </thead>
  {{ csrf_field() }}
  <tbody>
    @foreach ($customers as $key => $customer)
    <tr {{ $customer->active? 'class="warning"' : '' }}>
      <td>{{ $key +1 }}</td>
<!--       @if($customer->active == 0)
      <td><span class="label label-danger">Passive</span></td>
      @else
      <td><span class="label label-success">Active</span></td>
      @endif -->
      <td><a href="customer/{{ $customer->id }}"><strong>{{ $customer->name }}</strong></a></td>
      <td>{{ $customer->tlp }}</td>
      <td>
          <a href="customer/invoice/{{ $customer->id }}">
            <strong><i class="fa fa-file-text-o" aria-hidden="true"></i></strong>
          </a>
      </td>
<!--       <td>{!! Form::checkbox('active', $customer->id, $customer->active, ['class' => 'checkactive']) !!}</td> -->
      <td>
          <a href="#" class="edit-modal" data-id="{{$customer->id}}" data-name="{{$customer->name}}" data-email="{{$customer->email}}" data-alamat="{{$customer->alamat}}" data-tlp="{{$customer->tlp}}" data-active="{{$customer->active}}">Ubah</a>
      </td>
      <td>
      {!! Form::open(['method' => 'DELETE', 'id' => 'form_del_customer', 'action' => ['CustomerController@deleteCustomer', $customer->id]]) !!}
          <a href="#" type="submit" class="remove-customer" data-id="{{$customer->id}}">Hapus</a>
      {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>