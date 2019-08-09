<?php

use Illuminate\Database\Seeder;

class ArticleTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = [];

        for($i = 0; $i < 1000; $i++) {
            $result[] = [
                'article_id' => rand(1, 500),
                'tag_id' => rand(1, 100),
            ];
        }

        Db::table('article_tags')->insert($result);
    }
}
