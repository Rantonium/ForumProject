<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // creating the users
        $this->call(UsersTableSeeder::class);
        $this->call(ChannelsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ThreadsTableSeeder::class);
    }
}
