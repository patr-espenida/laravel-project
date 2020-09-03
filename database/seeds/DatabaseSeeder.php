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
        // $this->call(UserSeeder::class);
        $this->call([
            ActorSeeder::class,
            CertificateSeeder::class,
            GenreSeeder::class,
            FilmSeeder::class,
            ProducerSeeder::class,
            FilmProducerSeeder::class,
            RoleSeeder::class,
            ActorRoleSeeder::class
         ]);
    }
}
