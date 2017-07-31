<ul class="nav nav-tabs nav-justified">
 @foreach ($produks as $produk)
 	<li>
	    <a href="#" role="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	    {{ $produk->nama }} <br> <span class="badge">{{ $produk->qty }}</span><br> 
	    </a>
      	<ul class="dropdown-menu">
		    <li>
	    		<a href="#" class="edit-modal" 
	    			data-id="{{$produk->id}}" 
	    			data-nama="{{$produk->nama}}">Ubah Nama</a>
	    	</li>
      		<li class="divider"></li>
		    <li>
	    		<a href="#" class="create-modal" 
	    			data-id="{{$produk->id}}" 
	    			data-nama="{{$produk->nama}}">Tambah Stock</a>
	    	</li>
		    <li>
	    		<a href="produk/{{ $produk->id }}">Log Stock</a>
	    	</li>
	  	</ul>
 	</li>
 @endforeach
</ul>