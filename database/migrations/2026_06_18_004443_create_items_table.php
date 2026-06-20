<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new
class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('tomb_id', 20)->nullable()->unique();
            $table->string('publisher')->nullable();
            $table->year('publication_year')->nullable();
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->unsignedInteger('available_quantity')->default(1);
            $table->string('shelf_location')->nullable();
            $table->enum('status', ['available', 'unavailable', 'lost', 'damaged'])->default('available');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
