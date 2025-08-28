<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('cascade');
            
            $table->string('heading')->nullable();
            $table->string('subtitle')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->string('vacancy')->nullable();
            
            // FIXED: Use json() instead of string('demand_types[]')
            $table->json('demand_types')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demands');
    }
}