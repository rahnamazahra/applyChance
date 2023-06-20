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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('univercity_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('field_id');
            $table->string('title');
            $table->text('description');
            $table->foreign('field_id')->references('id')->on('fields')->cascadeOnDelete();
            $table->foreign('grade_id')->references('id')->on('grades')->cascadeOnDelete();
            $table->foreign('univercity_id')->references('id')->on('univercities')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
