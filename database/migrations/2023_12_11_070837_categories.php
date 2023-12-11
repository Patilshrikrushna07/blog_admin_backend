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
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('title')->nullable(false);
            $table->longText('description')->nullable(true);
            $table->string('front_image')->nullable(true);
            $table->string('cover_image')->nullable(true);
            $table->string('tags')->nullable(true);
            $table->boolean('is_active')->default(true);
            $table->boolean('parent_id')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('categories'); 
    }
};
