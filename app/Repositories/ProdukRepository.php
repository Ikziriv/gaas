<?php namespace App\Repositories;

use App\Models\Produk;
use App\Models\LogProduk;

class ProdukRepository 
{

    /**
     * The Role instance.
     *
     * @var \App\Models\Role
     */
    protected $produk;

    /**
     * Create a new RolegRepository instance.
     *
     * @param  \App\Models\Role $role
     * @return void
     */
    public function __construct(Produk $produk)
    {
        $this->produk = $produk;
    }

    /**
     * Get all roles.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->produk->all();
    }

}