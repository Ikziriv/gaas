<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(KategoriTableSeeder::class);
        $this->call(ProdukTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(PesanStatusTableSeeder::class);
        $this->call(PesanTableSeeder::class);
    }
}
