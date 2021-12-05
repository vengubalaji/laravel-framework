<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->from(1000);
            $table->string('roll_no',10)->unique();
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->enum('gender', ['M', 'F', 'T']);
            $table->string('year',10);
            $table->integer('department_id');
            $table->longText('address');
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->ipAddress('visitor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
