<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= new User();

        $user->number_document='1193111350';
        $user->name='Yecm';
        $user->last_name='Moscu';
        $user->email='yecm@gmail.com';
        $user->password=bcrypt('123456');
        $user->phone_number='3197901016';
        $user->address='calle falsa #82d';
        $user->rol='admin';
        $user->created_at=now();
        $user->updated_at=now();
        $user->save();

        $user::factory(10)->create();
    }
}
