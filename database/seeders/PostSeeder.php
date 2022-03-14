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
                'content'       => 'Lorem ipsum dolor sit amet. Ab odio nihil 33 dolorum tempore vel eligendi provident galisum consequatur et maxime delectus. ',
                'status'        => 1,
                'url_image'     => 'image1.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. Non quia optio non corporis deserunt sit corporis velit ea magnam laudantium cum molestiae saepe.',
                'status'        => 1,
                'url_image'     => 'image2.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'Lorem ipsum dolor sit amet. Eos incidunt optio quo cupiditate totam ea quia numquam cum sint est voluptas error rem inventore incidunt.',
                'status'        => 1,
                'url_image'     => 'image3.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. Vel corporis nulla eum reiciendis nemo aut molestiae dignissimos sed dolorum nihil.',
                'status'        => 1,
                'url_image'     => 'image4.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'Lorem ipsum dolor sit amet. Qui animi vitae 33 ducimus numquam qui voluptas totam est vero doloribus ea commodi rerum est facilis commodi.',
                'status'        => 1,
                'url_image'     => 'image5.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. 33 eius aperiam qui deserunt amet ea dignissimos ullam sit ratione alias eos voluptatem error. ',
                'status'        => 1,
                'url_image'     => 'image6.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. Est nobis magni eum delectus porro et delectus eligendi aut accusamus fugit. ',
                'status'        => 1,
                'url_image'     => 'image7.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'Lorem ipsum dolor sit amet. Eos quibusdam et soluta velit est neque nemo ex distinctio obcaecati vel quibusdam excepturi aut quia quia eos rerum nobis.',
                'status'        => 1,
                'url_image'     => 'image8.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'Lorem ipsum dolor sit amet. Et voluptate blanditiis ut quos earum sit quae aliquam hic laudantium dolores et galisum culpa.',
                'status'        => 1,
                'url_image'     => 'image9.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. A vitae rerum sit facilis minima sit sint reiciendis et assumenda inventore aut dolor aliquam est veritatis magni sit laborum dolor.',
                'status'        => 1,
                'url_image'     => 'image10.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'Lorem ipsum dolor sit amet. Ad quis dicta qui exercitationem enim qui perspiciatis explicabo',
                'status'        => 1,
                'url_image'     => 'image11.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. Eum rerum laboriosam est voluptatem corrupti qui rerum repellendus et minima cumque aut omnis optio eos totam esse in voluptate repellat.',
                'status'        => 1,
                'url_image'     => 'image12.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. Ut voluptatum quae 33 veniam ut porro similique et numquam veniam ea esse accusantium eum officia quibusdam. ',
                'status'        => 1,
                'url_image'     => 'image13.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'Lorem ipsum dolor sit amet. Quo cumque numquam qui alias fuga quo delectus omnis ut repellendus enim sit tenetur nostrum id pariatur deleniti',
                'status'        => 1,
                'url_image'     => 'image14.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. Est iste dolor cum facere consequatur ut nihil mollitia est nisi dolore nam distinctio nulla qui facere vitae. ',
                'status'        => 1,
                'url_image'     => 'image15.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'Lorem ipsum dolor sit amet. Ad impedit laboriosam ut molestiae obcaecati ea aliquam incidunt vel rerum tenetur est ducimus alias in ratione doloribus.',
                'status'        => 1,
                'url_image'     => 'image16.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'Lorem ipsum dolor sit amet. Sit consequatur ipsum non velit velit cum odio autem ea eveniet quis.',
                'status'        => 1,
                'url_image'     => 'image17.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. Sit facilis assumenda non quos illo ut voluptas deserunt et autem iure eum quasi Quis',
                'status'        => 1,
                'url_image'     => 'image18.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. Ut laudantium adipisci ab galisum molestias aut voluptate sunt ut aspernatur incidunt et porro voluptates. ',
                'status'        => 1,
                'url_image'     => 'image19.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. Et consequatur aliquam eum voluptatem accusamus id quia consequatur est minima atque qui galisum officia aut illum impedit.',
                'status'        => 1,
                'url_image'     => 'image20.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'content'       => 'Lorem ipsum dolor sit amet. Aut galisum provident nam dolore rerum ut consectetur nisi At repudiandae nobis. ',
                'status'        => 1,
                'url_image'     => 'image21.jpg',
                'count'         => 10,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'content'       => 'Lorem ipsum dolor sit amet. Rem tempora totam est neque molestias aut repudiandae quia qui magnam dolorum et unde dolor ea eaque itaque ex accusantium atque. ',
                'status'        => 1,
                'url_image'     => 'image22.jpg',
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
