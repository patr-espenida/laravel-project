<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_roles', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->text('description');
                $table->unsignedBigInteger('actor_id')->nullable();
                $table->foreign('actor_id')->references('id')->on('actors');
                $table->unsignedBigInteger('role_id')->nullable();
                $table->foreign('role_id')->references('id')->on('roles');
                $table->unsignedBigInteger('film_id')->nullable();
                $table->foreign('film_id')->references('id')->on('films');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_roles');
    }
}
