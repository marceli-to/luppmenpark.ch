<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('apartments', function (Blueprint $table) {
      $table->id();
      $table->string('number')->unique();
      $table->string('house');
      $table->string('floor');
      $table->string('rooms');
      $table->decimal('area', 6, 1);
      $table->unsignedInteger('rent')->nullable();
      $table->unsignedInteger('share')->nullable();
      $table->string('status')->default('free');
      $table->unsignedSmallInteger('sort')->default(0);
      $table->string('updated_by')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('apartments');
  }
};
