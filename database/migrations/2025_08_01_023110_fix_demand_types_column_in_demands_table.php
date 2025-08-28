<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixDemandTypesColumnInDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demands', function (Blueprint $table) {
            // Drop the incorrectly created column if it exists
            if (Schema::hasColumn('demands', 'demand_types[]')) {
                $table->dropColumn('demand_types[]');
            }
            
            // Add the correct column for storing JSON/array data
            if (!Schema::hasColumn('demands', 'demand_types')) {
                $table->json('demand_types')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demands', function (Blueprint $table) {
            $table->dropColumn('demand_types');
            // Recreate the old incorrect column if needed for rollback
            $table->string('demand_types[]')->nullable();
        });
    }
}