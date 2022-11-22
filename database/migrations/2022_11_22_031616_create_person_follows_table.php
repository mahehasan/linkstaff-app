<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_follows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id_fk');
            $table->unsignedBigInteger('follow_id_fk');
            $table->timestamp('follow_at');
            $table->timestamps();

            $table->foreign('follow_id_fk')->references('id')->on('users');
            $table->foreign('user_id_fk')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_follows');
    }
};
