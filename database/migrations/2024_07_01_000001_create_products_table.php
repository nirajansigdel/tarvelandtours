<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('heading')->nullable();
            $table->string('subtitle')->nullable();
            $table->date('date')->nullable();
            $table->string('duration')->nullable();
            $table->integer('people')->nullable();
            $table->string('package')->nullable();
            $table->decimal('original_price', 10, 2)->nullable();
            $table->decimal('discounted_price', 10, 2)->nullable();
            $table->string('location')->nullable();
            $table->string('transportation')->nullable();
            $table->text('content')->nullable();
            $table->json('includes')->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->json('product_types')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
