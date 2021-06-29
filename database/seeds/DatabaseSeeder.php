<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Usuario manual
        App\User::create([
            'name' => 'Jose Diaz',
            'email' => 'jose@admin.com',
            'password' => bcrypt('123456789')
        ]);

        factory(App\Post::class, 50)->create();
    }
}
