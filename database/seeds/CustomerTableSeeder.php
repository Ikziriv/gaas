<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Customer::create([
			'name' => 'Anton Idris',
			'email' => 'anton@gmail.com',
			'alamat' => 'Jl Gandaria Selatan no 7',
			'tlp' => '0811665532',
			'active' => true
		]);

		Customer::create([
			'name' => 'Joni Ari',
			'email' => 'joni@gmail.com',
			'alamat' => 'Jl Gandaria Selatan no 7',
			'tlp' => '0811665532',
			'active' => true
		]);

		Customer::create([
			'name' => 'Lulu Maria',
			'email' => 'lulu@gmail.com',
			'alamat' => 'Jl Gandaria Selatan no 7',
			'tlp' => '0811665532',
			'active' => true
		]);

		Customer::create([
			'name' => 'Bambang Hermawan',
			'email' => 'bambang@gmail.com',
			'alamat' => 'Jl Gandaria Selatan no 7',
			'tlp' => '0811665532',
			'active' => true
		]);
    }
}
