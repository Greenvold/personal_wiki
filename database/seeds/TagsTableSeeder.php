<?php

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
        $tag1 = App\Tag::create([
            'title' => 'IT',
            'description' => 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print'
        ]);

        $tag2 = App\Tag::create([
            'title' => 'Front-end',
            'description' => 'The passage experienced a surge in popularity during the 1960s when Letraset '
        ]);

        $tag3 = App\Tag::create([
            'title' => 'Back-end',
            'description' => 'The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.)'
        ]);

        $tag4 = App\Tag::create([
            'title' => 'SharePoint',
            'description' => 'Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. '
        ]);
    }
}