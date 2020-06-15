<?php

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
         App\Post::create([

        'user_id'=>1,
        'title'=>'test title',
        'content'=>'Demo Text Demo Text  Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text Demo Text'



       ]);
    }
}
