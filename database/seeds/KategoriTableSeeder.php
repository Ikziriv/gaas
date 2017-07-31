<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Kategori::create([
			'name' => 'Gas'
		]);

		Kategori::create([
			'name' => 'Nitrogen'
		]);
    }
}
