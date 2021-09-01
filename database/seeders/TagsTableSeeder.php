<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['name' => 'Jedi', 'slug'=> 'jedi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Pets', 'slug'=> 'pets', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Memes', 'slug'=> 'memes', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
