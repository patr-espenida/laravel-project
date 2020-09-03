<?php

use Illuminate\Database\Seeder;

class ActorRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\actor_role::class,50)->create();
    }
}
