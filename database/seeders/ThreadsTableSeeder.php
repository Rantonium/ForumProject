<?php

namespace Database\Seeders;

use App\Models\Thread;
use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder{
    public function run(){
        Thread::factory()->count(50)->create(['author_id' => rand(1,10)]);
    }
}
