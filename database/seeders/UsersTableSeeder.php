<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '管理人',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin1234'),
            'role' => 1
        ]);
        factory(User::class, 100)->create();
    }
}
