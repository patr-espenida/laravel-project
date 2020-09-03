<?php

use Illuminate\Database\Seeder;

class FilmProducerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\film_producer::class,50)->create();
    }
}
