<?php

use Illuminate\Database\Seeder;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $names = [
           'Политика',
            'Общество',
            'Экономика',
            'В мире',
            'Происшествия',
            'Спорт',
            'Наука',
            'Культура',
            'Недвижимость',
            'Религия',
            'Туризм',
            'Радио',
            'Подкасты',
        ];

        for($i = 0; $i < count($names); $i++) {
            $categories[] = [
                'category_title' => $names[$i],
                'category_slug' => Str::slug($names[$i]),
                'created_at' => Carbon::now()
            ];
        }

        DB::table('news_categories')->insert($categories);
    }
}
