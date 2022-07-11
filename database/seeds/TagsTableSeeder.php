<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'vegano',
            'vegetariano',
            'fit',
            'carne',
            'pesce',
            'senza glutine',
            'senza grassi',
            'senza zuccheri',
        ];

        foreach($tags as $tag){
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Tag::generateSlug($new_tag->name);

            $new_tag->save();
        }
    }
}
