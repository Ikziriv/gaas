<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\PesananStatus; 

class PesanStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		PesananStatus::create([
			'name' => 'New',
            'slug' => 'new'
		]);

		PesananStatus::create([
			'name' => 'Otw',
            'slug' => 'otw'
		]);

		PesananStatus::create([
			'name' => 'Completed',
            'slug' => 'completed'
		]);
    }
}
