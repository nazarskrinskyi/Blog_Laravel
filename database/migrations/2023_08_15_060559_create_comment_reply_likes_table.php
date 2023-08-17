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
        Schema::create('comment_reply_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reply_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('user_id','comment_reply_user_idx');
            $table->index('reply_id','comment_reply_idx');

            $table->foreign('user_id','comment_reply_user_fk')->on('users')->references('id');
            $table->foreign('reply_id','comment_reply_fk')->on('comment_replies')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_reply_likes');
    }
};
