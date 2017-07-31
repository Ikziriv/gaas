<html> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<body> 
<h1>PT. GASINDO</h1> 
<h4>Jl. Pondok Indah </h4> 
<h5>Total Customer User : {{$total}} </h5>

@if(!empty($orders)) 
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th align="center">ID</th>
        <th align="center">Nama</th>
        <th align="center">Produk</th>
        <th align="center">Qty</th>
        <th align="center">Tanggal</th>
    </tr>
    </thead>
    @foreach ($orders as $row)
    <tr>
        <td align="center">{{$row->id}}</td>
        <td align="center">{{$row->customer->name}}</td>
        <td align="center">{{$row->produk->nama}}</td>
        <td align="center">{{$row->qty}}</td>
        <td align="center">{{$row->created_at}}</td>
    </tr>
    @endforeach 
</table> 
@endif 
</body> 
</html>