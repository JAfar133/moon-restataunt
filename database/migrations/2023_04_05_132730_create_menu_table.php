<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Storage::createDirectory('menu');
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->timestamps();
        });

        \Illuminate\Support\Facades\Artisan::call('storage:link');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Storage::deleteDirectory('menu');
        Schema::dropIfExists('menu');
    }
};
