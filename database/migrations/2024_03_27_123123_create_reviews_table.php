<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->string('rating');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('show_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('show_id')->references('id')->on('shows');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
