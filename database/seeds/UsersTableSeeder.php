<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = App\User::create([
            'name' => 'yoanesrn',
            'email' => 'yoanesrn@gmail.com',
            'password' => Hash::make('12345678'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/avatar.png',
            'about' =>'Lorem ipsum',
            'facebook' =>'facebook.com',
            'youtube' =>'youtube.com',
        ]);

    }
}

//user 1 pass 12345678
//user 2 pass 12345678