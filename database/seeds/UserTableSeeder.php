<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    private $admin;
    private $authUser;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRoles();
        $this->createAdminUser();
    }

    public function createRoles()
    {
        $this->authUser = Role::create([
            'name' => 'super admin'
        ]);

        $this->admin = Role::create([
            'name' => 'admin'
        ]);

        $this->authUser = Role::create([
            'name' => 'auth user'
        ]);
    }

    public function createAdminUser()
    {
        $user = App\Models\User::create([
            'name' => 'Admin User',
			'username' => 'admin',
			'email' => 'admin@gmail.com',
			'tlp' => '0811665532',
			'alamat' => 'Jl Gandaria Selatan no 7',
            'password' => bcrypt('admin'),
            'active' => 1,
        ]);

        $profile = App\Models\Profile::create([
            'user_id' => $user->id,
            'country' => 'Indoesia',
            'designation' => 'Admin System',
            'options' => ['sidebar' => true]
        ]);

        $user->assignRole(['admin', 'auth user']);
    }
}
