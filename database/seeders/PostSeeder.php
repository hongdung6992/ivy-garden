<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'user_id'       => 1,
                'content'       => 'content 1',
                'status'        => 1,
                'url_image'     => 'url_example.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'content 2',
                'status'        => 1,
                'url_image'     => 'url_example.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'content 3',
                'status'        => 1,
                'url_image'     => 'url_example.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'content 4',
                'status'        => 1,
                'url_image'     => 'url_example.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'content 5',
                'status'        => 1,
                'url_image'     => 'url_example.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'content 6',
                'status'        => 1,
                'url_image'     => 'url_example.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'content 7',
                'status'        => 1,
                'url_image'     => 'url_example.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'content 8',
                'status'        => 1,
                'url_image'     => 'url_example.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'content 9',
                'status'        => 1,
                'url_image'     => 'url_example.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'content 10',
                'status'        => 1,
                'url_image'     => 'url_example.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        ];
      
        DB::table('posts')->insert($posts);

        $posts = Post::all();
        // Populate the pivot table\
        Category::all()->each(function ($categories) use ($posts) { 
            $categories->posts()->attach(
                $posts->random(rand(1, 2))->pluck('id')->toArray()
            ); 
        });
    }
}
