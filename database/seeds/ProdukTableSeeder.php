<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class ProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Produk::create([
			'nama' => 'TBG BG 5,5 KG',
			'slug' => 'tb1',
			'qty' => 10,
			'kategori_id' => 1,
		]);
		Produk::create([
			'nama' => 'TBG ISI 5,5 KG',
			'slug' => 'tbisi1',
			'qty' => 10,
			'kategori_id' => 1,
		]);
		Produk::create([
			'nama' => 'TBG 12 KG',
			'slug' => 'tb2',
			'qty' => 10,
			'kategori_id' => 1,
		]);
		Produk::create([
			'nama' => 'ISI 12 KG',
			'slug' => 'tbisi2',
			'qty' => 10,
			'kategori_id' => 1,
		]);
		Produk::create([
			'nama' => 'TBG BG 12 KG',
			'slug' => 'tb3',
			'qty' => 10,
			'kategori_id' => 1,
		]);
		Produk::create([
			'nama' => 'ISI BG 12 KG',
			'slug' => 'tbisi3',
			'qty' => 10,
			'kategori_id' => 1,
		]);
    }
}
