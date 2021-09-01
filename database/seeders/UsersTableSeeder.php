<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'=> 'Ratonu',
            'email' => 'stars.keeper@yahoo.com',
            'password' => bcrypt('12345'),
            'type'  => User::ADMIN,]);

        User::factory()->create([
            'name'=> 'Normal User',
            'email' => 'normal.user@email.com',
            'password' => bcrypt('12345'),
            'type'  => User::DEFAULT,]);

        User::factory(10)->create();
    }
}
