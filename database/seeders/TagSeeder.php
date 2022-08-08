<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::get();
        foreach($posts as $post)
        {   $tags = fake()->randomElements(["General" ,"Study" ,"Sport" ,"Food" ,"Drink"] ,random_int(1 ,5));
            $tag_ids = [];
        foreach($tags as $tag_name)
            {   $tag = Tag::where('name' ,$tag_name)->first();
                if(!$tag)
                {   $tag = new Tag();
                    $tag->name = $tag_name;
                    $tag->save();
                }
                $tag_ids[] = $tag->id;
            }
            $post->Tags()->sync($tag_ids);
        }
    }
}
