<?php

use Illuminate\Database\Seeder;

class NewsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\News\NewsTag::class, 100)->create();
    }
}
