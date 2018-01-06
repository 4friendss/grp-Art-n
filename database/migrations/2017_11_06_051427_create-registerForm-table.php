<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registerForms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('age');
            $table->string('education');
            $table->string('tel',11);
            $table->string('expert');
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
        Schema::dropIfExists('registerForms');
    }
}
