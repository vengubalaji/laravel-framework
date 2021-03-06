<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('users')->insert([
        //     'name' => 'John Doe',
        //     'email' => 'john@laravel.test',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        //     'remember_token' => Str::random(10),
        //     'api_token' => Str::random(80)
        // ]);

        // $this->call(UsersTableSeeder::class);
        // $doe = factory(App\User::class)->states('john-doe')->create();
        // $else = factory(App\User::class, 20)->create();

        // $users = $else->concat([$doe]);

        // $posts = factory(App\BlogPost::class, 50)->make()->each(function($post) use ($users) {
        //     $post->user_id = $users->random()->id;
        //     $post->save();
        // });

        // $comments = factory(App\Comment::class, 150)->make()->each(function ($comment) use ($posts) {
        //     $comment->blog_post_id = $posts->random()->id;
        //     $comment->save();
        // });

        // if ($this->command->confirm('Do you want to refresh the database?')) {
        //     $this->command->call('migrate:refresh');
        //     $this->command->info('Database was refreshed');
        // }

        // $this->call([
        //     UsersTableSeeder::class, 
        //     BlogPostsTableSeeder::class, 
        //     CommentsTableSeeder::class
        // ]);
    }
}
