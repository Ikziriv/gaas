<div class="sidebar-nav">
<ul>
{{--     <li>
        <a href="{{ route('admin') }}" class="nav-header">
            <i class="fa fa-fw fa-dashboard"></i> Dashboard
        </a>
    </li> --}}
    {{-- Transaksi --}}
    <li>
        <a href="{{ route('transaksi.index') }}" class="nav-header collapsed">
            <i class="fa fa-fw fa-usd"></i> Pemesanan
        </a>
    </li>
    {{-- Produk --}}
    <li>
        <a href="{{ route('produk.index') }}" class="nav-header collapsed">
            <i class="fa fa-folder"></i> Gudang
        </a>
    </li>
    {{-- Customer --}}
    <li>
        <a href="{{ route('customer.index') }}" class="nav-header collapsed">
            <i class="fa fa-fw fa-briefcase"></i> Pelanggan
        </a>
    </li>
    {{--  User --}}
    <li>
        <a href="{{route('activities')}}" class="nav-header collapsed">
            <i class="fa fa-fw fa-user"></i> Aktifitas
        </a>
    </li>
    {{-- Help --}}
    <li><a href="#" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Bantuan</a></li>

</ul>
</div>