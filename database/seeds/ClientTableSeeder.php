<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \LarAngu\Client::truncate();
        factory(\LarAngu\Client::class, 10)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
