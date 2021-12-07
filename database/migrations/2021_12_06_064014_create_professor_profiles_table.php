<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_profiles', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ['M', 'F', 'T']);
            $table->integer('department_id');
            $table->integer('experience');
            $table->longText('address');
            $table->timestamps();

            $table->unsignedInteger('professors_id')->unique();
            $table->foreign('professors_id')->references('id')->on('professors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_profiles');
    }
}
