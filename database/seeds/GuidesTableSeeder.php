<?php

use App\Guide;
use Illuminate\Database\Seeder;

class GuidesTableSeeder extends Seeder
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

        $tag5 = App\Tag::create([
            'title' => 'MS Excel',
            'description' => 'Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. '
        ]);

        $tag6 = App\Tag::create([
            'title' => 'Microsoft Office',
            'description' => 'Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. '
        ]);

        $tag7 = App\Tag::create([
            'title' => 'MS Word',
            'description' => 'Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. '
        ]);
        //
        //factory(App\Guide::class, 10)->create();
        $faker = \Faker\Factory::create();

        $guide1 = Guide::create([
            'title' => 'Microsoft Excel VLOOKUP',
            'short_description' => 'In this short guide I will explain to you how does VLOOKUP work.',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/excel.png',
            'user_id' => $faker->randomElement(['1', '2', '3'])
        ]);

        $guide1->tags()->attach($tag6);
        $guide1->tags()->attach($tag5);

        $guide2 = Guide::create([
            'title' => 'What is SharePoint',
            'short_description' => 'Hi, Have you ever wondered what SharePoitn is? Here you can find out!',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/sharepoint.png',
            'user_id' => $faker->randomElement(['1', '2', '3'])
        ]);

        $guide2->tags()->attach($tag4);

        $guide3 = Guide::create([
            'title' => 'Microsoft Excel SUMIF',
            'short_description' => 'In this short guide I will explain to you how does SUMIF work.',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/excel.png',
            'user_id' => $faker->randomElement(['1', '2', '3'])
        ]);

        $guide3->tags()->attach($tag6);
        $guide3->tags()->attach($tag5);
        $guide4 = Guide::create([
            'title' => 'MS Excel Pivot Tables',
            'short_description' => 'In this short guide I will explain to you how does PIVOT TABLES work.',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/excel.png',
            'user_id' => $faker->randomElement(['1', '2', '3'])
        ]);

        $guide3->tags()->attach($tag6);
        $guide3->tags()->attach($tag5);
        $guide4 = Guide::create([
            'title' => 'What is VBA?',
            'short_description' => 'In this short guide I will explain to you how does VBA work.',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/excel.png',
            'user_id' => $faker->randomElement(['1', '2', '3'])
        ]);

        $guide4->tags()->attach($tag6);
        $guide4->tags()->attach($tag1);
        $guide5 = Guide::create([
            'title' => 'How to build Laravel project?',
            'short_description' => 'In here i will show you how to create new laravel project/',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/angular.png',
            'user_id' => $faker->randomElement(['1', '2', '3'])
        ]);

        $guide5->tags()->attach($tag3);
        $guide5->tags()->attach($tag3);
        $guide6 = Guide::create([
            'title' => 'What is Bootstrap 4?',
            'short_description' => 'what is bootsrap? Here you will find out',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/bootstrap.png',
            'user_id' => $faker->randomElement(['1', '2', '3'])
        ]);

        $guide6->tags()->sync($tag1);
        $guide6->tags()->sync($tag3);
        $guide6->tags()->sync($tag2);

        $guide7 = Guide::create([
            'title' => 'What is OOP?',
            'short_description' => 'what is OOP? Here you will find out',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/c.jpg',
            'user_id' => $faker->randomElement(['1', '2', '3'])
        ]);

        $guide7->tags()->attach($tag3);


        $guide8 = Guide::create([
            'title' => 'How to create pagination in word?',
            'short_description' => 'what is OOP? Here you will find out',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/word.jpg',
            'user_id' => $faker->randomElement(['1', '2', '3'])
        ]);

        $guide8->tags()->attach($tag7);
        $guide8->tags()->attach($tag6);
    }
}