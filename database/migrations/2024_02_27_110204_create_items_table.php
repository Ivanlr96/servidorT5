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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('box_id');
            $table->foreign('box_id')->references('id')->on('boxes');
            $table->string('name');
            $table->string('description');
            $table->string('picture')->nullable();
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
