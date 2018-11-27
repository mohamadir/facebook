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
        // $this->call(UsersTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('comments')->truncate();
        factory(App\User::class,50)->create();
        factory(App\Post::class,100)->create();
        factory(App\Comment::class,300)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
