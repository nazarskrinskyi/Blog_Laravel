<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('follower_id');
            $table->foreign('user_id','followers_userId_fk')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('follower_id','followers_followerId_fk')->on('users')->references('id')->onDelete('cascade');
            $table->index('user_id', 'followers_userId_idx');
            $table->index('follower_id', 'followers_followerId_idx');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
