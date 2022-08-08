<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $posts = Post::get();
        foreach($posts as $post)
        {   $number_comment = rand(1 ,20);
            for($i = 1;$i <= $number_comment; $i++)
            {   $comment = new Comment();
                $comment->message = fake()->realText(30);
                $post->comments()->save($comment);

            }
        }
    }
}
