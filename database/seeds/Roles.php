<?php

use Illuminate\Database\Seeder;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'moderator',
            'author',
            'user',
            'unconfirmed',
        ];

        for($i = 0; $i < count($roles); $i++) {

            $result[] = [
                'title' => $roles[$i],
                'slug' => Str::slug($roles[$i])
            ];
        }

        DB::table('roles')->insert($result);
    }
}
