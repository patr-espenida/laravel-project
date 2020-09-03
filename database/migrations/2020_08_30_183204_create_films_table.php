<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->softDeletes();
                $table->string('title',100);
                $table->text('story');
                $table->date('release_date');
                $table->time('duration',0);
                $table->unsignedBigInteger('certificate_id')->nullable();
                $table->foreign('certificate_id')->references('id')->on('certificates');
                $table->unsignedBigInteger('genre_id')->nullable();
                $table->foreign('genre_id')->references('id')->on('genres');



            });
        }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
