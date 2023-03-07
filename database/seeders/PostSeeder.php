<?php

namespace Database\Seeders;

use App\Models\post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        post::create([
            'title' => 'laravel 9 title',
            'description' => 'laravel 9 description',
            'is_publish' => true,
            'is_active' => false,
            'user_id' => $user->id
        ]);

        post::create([
            'title' => 'larave 8 title',
            'description' => 'laravel 8 description',
            'is_publish' => true,
            'is_active' => false,
            'user_id' => $user->id
        ]);

        post::create([
            'title' => 'larave 7 title',
            'description' => 'laravel 7 description',
            'is_publish' => true,
            'is_active' => false,
            'user_id' => $user->id
        ]);
    }
}
