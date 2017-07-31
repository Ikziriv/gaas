<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role; 

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Role::create([
			'name' => 'Super Admin',
            'slug' => 'su'
		]);

		Role::create([
			'name' => 'Admin',
            'slug' => 'admin'
		]);
    }
}
