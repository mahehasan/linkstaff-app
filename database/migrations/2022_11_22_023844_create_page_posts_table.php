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
        Schema::create('page_posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_content');
            $table->unsignedBigInteger('page_id_fk');
            $table->unsignedBigInteger('user_id_fk');
            $table->timestamps();

            $table->foreign('page_id_fk')->references('id')->on('pages');
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
        Schema::dropIfExists('page_posts');
    }
};
