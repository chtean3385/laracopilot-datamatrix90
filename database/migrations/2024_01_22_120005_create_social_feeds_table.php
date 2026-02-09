<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('social_feeds', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->text('content');
            $table->string('image_url')->nullable();
            $table->string('post_url')->unique();
            $table->timestamp('posted_at');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('social_feeds');
    }
};