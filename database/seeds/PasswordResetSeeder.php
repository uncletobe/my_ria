<?php

use Illuminate\Database\Seeder;

class PasswordResetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::
        select('id', 'email')
            ->get()
            ->toArray();


        for($i = 0; $i < 100; $i++) {
            $resets[] = [
              'user_id' => $users[$i]['id'],
              'email' => $users[$i]['email'],
            ];
        }

        Db::table('password_reset')->insert($resets);
    }
}
