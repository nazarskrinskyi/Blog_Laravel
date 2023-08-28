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
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('comment_id');
            $table->text('content');
            $table->timestamps();


            $table->index('user_id','reply_user_idx');
            $table->index('comment_id','reply_comment_idx');

            $table->foreign('user_id','reply_user_fk')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('comment_id','reply_comment_fk')->on('comments')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_replies');
    }
};
