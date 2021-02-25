<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Dinas Komunikasi dan Informatika',
            'email' => 'kominfo@malangkab.go.id',
            'user_login' => '3507124',
            'password' => bcrypt('diskominfo123')
        ]);

        $user = User::create([
            'name' => 'Bagian Administrasi Tata Pemerintahan',
            'email' => 'bagadminta@malangkab.go.id',
            'user_login' => '3507115',
            'password' => bcrypt('bagadminta123')
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);

    }
}
