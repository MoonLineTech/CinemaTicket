<?php

use App\Models\Comment;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cinema_id');
            $table->unsignedBigInteger('movie_id');
            $table->enum('state', Comment::STATES)->default(Comment::PENDING);
            $table->text('body');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('cinema_id')
                ->references('id')->on('cinemas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('movie_id')
                ->references('id')->on('movies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
