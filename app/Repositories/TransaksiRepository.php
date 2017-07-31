<?php namespace App\Repositories;

use App\Models\Pesanan;

class TransaksiRepository extends BaseRepository {

	/**
	 * Create a new ContactRepository instance.
	 *
	 * @param  App\Models\Contact $pesanan
	 * @return void
	 */
	public function __construct(Pesanan $pesanan)
	{
		$this->model = $pesanan;
	}

	public function index()
	{
		return $this->model
		->with('produk')
		->with('customer')	
		->orderBy('id', 'desc')
		->get();
	}

	public function indexReport($n)
	{
		return $this->model
		->with('produk')
		->with('customer')	
		->orderBy('id', 'desc')
		->simplePaginate($n);
	}

  	private function save($pesanan, $inputs)
	{		
		if(isset($inputs['otw'])) 
		{
			$pesanan->otw = $inputs['otw'] == 'true';		
		}	
		elseif(isset($inputs['done'])) 
		{
			$pesanan->done = $inputs['done'] == 'true';		
		} else {

		$pesanan->customer_id = $inputs['customer_id'];
		$pesanan->produk_id = $inputs['produk_id'];
		$pesanan->new = $inputs['new'];
		$pesanan->otw = $inputs['otw'];
		$pesanan->done = $inputs['done'];
		$pesanan->qty = $inputs['qty'];
		}
		$pesanan->save();
	}

	/**
	 * Update a pesanan.
	 *
	 * @param  bool  $vu
	 * @param  int   $id
	 * @return void
	 */
	public function update($inputs, $pesanan)
	{
		$this->save($pesanan, $inputs);
	}

}