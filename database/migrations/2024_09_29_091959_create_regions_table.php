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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('population')->nullable();
            $table->float('area')->nullable();
            $table->string('timezone')->nullable();
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.__ 
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};
