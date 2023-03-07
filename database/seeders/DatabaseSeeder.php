<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // post::factory(10000)->create();

        // post::factory(10)->create([
        //     'title' => 'Mr. Shahbaz Mir'
        // ]);

        Schema::disableForeignKeyConstraints();
        post::truncate();
        Schema::enableForeignKeyConstraints();

        // post::factory()->count(10)->state(new Sequence(
        //     ['is_publish' => 0],
        //     ['is_publish' => 1]
        // ))->create();

        // User::factory()->has(post::factory()->count(5))->create();
        //    User::factory()->hasposts(5)->create(); 

        // User::factory()
        //     ->has(Role::factory()->count(1))
        //     ->create();
        $this->call([
            PostSeeder::class,
            TagSeeder::class
        ]);


    }
}
