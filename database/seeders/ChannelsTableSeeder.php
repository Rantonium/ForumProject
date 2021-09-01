<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->insert([
            ['name' => 'Home', 'slug'=> 'home', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Raccoons', 'slug'=> 'raccoons', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Star Wars', 'slug'=> 'star-wars', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Dank Memes', 'slug'=> 'dank-memes', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
