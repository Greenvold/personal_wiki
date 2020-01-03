<?php

use App\Asset;
use App\Episode;
use App\Group;
use App\User;
use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = factory(User::class)->create([
            'email' => 'rudolf.bruder@gmail.com'
        ]);

        $user2 = factory(User::class)->create([
            'email' => 'dasa.bruderova@gmail.com'
        ]);


        $user3 = factory(User::class)->create([
            'email' => 'gabriel.vadkerti@gmail.com'
        ]);


        $group1 = Group::create([
            'title' => 'Teacher',
            'description' => 'Group for teachers.'
        ]);

        $user1->groups()->attach($group1);

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

        $asset1 = Asset::create([
            'title' => 'Microsoft Excel VLOOKUP',
            'short_description' => 'In this short guide I will explain to you how does VLOOKUP work.',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/excel.png',
            'type' => 'guide',
            'user_id' => $user3->id
        ]);

        $asset1->tags()->attach($tag6);
        $asset1->tags()->attach($tag5);

        $asset2 = Asset::create([
            'title' => 'What is SharePoint',
            'short_description' => 'Hi, Have you ever wondered what SharePoitn is? Here you can find out!',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/sharepoint.png',
            'type' => 'guide',
            'user_id' => $faker->randomElement([$user1->id, $user2->id, $user3->id])
        ]);

        $asset2->tags()->attach($tag4);

        $asset3 = Asset::create([
            'title' => 'Microsoft Excel SUMIF',
            'short_description' => 'In this short guide I will explain to you how does SUMIF work.',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/excel.png',
            'type' => 'guide',
            'user_id' => $faker->randomElement([$user1->id, $user2->id, $user3->id])
        ]);

        $asset3->tags()->attach($tag6);
        $asset3->tags()->attach($tag5);
        $asset4 = Asset::create([
            'title' => 'MS Excel Pivot Tables',
            'short_description' => 'In this short guide I will explain to you how does PIVOT TABLES work.',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/excel.png',
            'type' => 'guide',
            'user_id' => $faker->randomElement([$user1->id, $user2->id, $user3->id])
        ]);

        $asset4->tags()->attach($tag6);
        $asset4->tags()->attach($tag5);
        $asset5 = Asset::create([
            'title' => 'What is VBA?',
            'short_description' => 'In this short guide I will explain to you how does VBA work.',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/excel.png',
            'type' => 'guide',
            'user_id' => $faker->randomElement([$user1->id, $user2->id, $user3->id])
        ]);

        $asset5->tags()->attach($tag6);
        $asset5->tags()->attach($tag1);
        $asset6 = Asset::create([
            'title' => 'How to build Laravel project?',
            'short_description' => 'In here i will show you how to create new laravel project/',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/angular.png',
            'type' => 'guide',
            'user_id' => $faker->randomElement([$user1->id, $user2->id, $user3->id])
        ]);

        $asset6->tags()->attach($tag3);
        $asset6->tags()->attach($tag3);
        $asset7 = Asset::create([
            'title' => 'What is Bootstrap 4?',
            'short_description' => 'what is bootsrap? Here you will find out',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/bootstrap.png',
            'type' => 'guide',
            'user_id' => $faker->randomElement([$user1->id, $user2->id, $user3->id])
        ]);

        $asset7->tags()->sync($tag1);
        $asset7->tags()->sync($tag3);
        $asset7->tags()->sync($tag2);

        $asset8 = Asset::create([
            'title' => 'What is OOP?',
            'short_description' => 'what is OOP? Here you will find out',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/c.jpg',
            'type' => 'guide',
            'user_id' => $faker->randomElement([$user1->id, $user2->id, $user3->id])
        ]);

        $asset8->tags()->attach($tag3);


        $asset9 = Asset::create([
            'title' => 'How to create pagination in word?',
            'short_description' => 'what is OOP? Here you will find out',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/word.jpg',
            'type' => 'guide',
            'user_id' => $user1->id
        ]);

        $asset9->tags()->attach($tag7);
        $asset9->tags()->attach($tag6);
        $asset10 = Asset::create([
            'title' => 'Bootstrap course',
            'short_description' => 'How to use bootstrap',
            'content' => $faker->realText(2500),
            'published_at' => date('d/m/Y', strtotime($faker->date())),
            'image' => 'guides/word.jpg',
            'type' => 'course',
            'user_id' => $user1->id
        ]);

        $asset10->tags()->attach($tag2);

        $episode1 = Episode::create([
            'title' => 'What is Bootstrap 4 framework?',
            'short_description' => 'In this lesson I am going to show you what is Bootstrap 4 and what does word framework mean.',
            'asset_id' => '1',
            'order_number' => '1',
            'video' => 'episode1.mp4'
        ]);

        $episode2 = Episode::create([
            'title' => 'How to setup our IDE',
            'short_description' => 'In this lesson I am going to show you how to setup your IDE, what IDE actually is and how to make it look as good as possible.',
            'asset_id' => '1',
            'order_number' => '2',
            'video' => 'episode2.mp4'
        ]);

        $episode3 = Episode::create([
            'title' => 'Hello world!',
            'short_description' => 'In this lesson we are goin to create our veyr first website using bootstrap. As you can say from the episode title Hello world!',
            'asset_id' => '1',
            'order_number' => '3',
            'video' => 'episode3.mp4'
        ]);


        $episode4 = Episode::create([
            'title' => 'What is container? What is bootstrap grid?',
            'short_description' => 'In this lesson I am going to show you how does the basic bootstrap grid system work.',
            'asset_id' => '1',
            'order_number' => '4',
            'video' => 'episode4.mp4'
        ]);


        $asset10->episodes()->attach($episode1);
        $asset10->episodes()->attach($episode2);
        $asset10->episodes()->attach($episode3);
        $asset10->episodes()->attach($episode4);
    }
}