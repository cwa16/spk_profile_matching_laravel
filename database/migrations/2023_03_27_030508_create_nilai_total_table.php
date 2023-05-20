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
        Schema::create('nilai_total', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bobot');
            $table->double('ncfp', 2);
            $table->double('nsfp', 2);
            $table->double('n_totalp', 2);
            $table->double('ncfs', 2);
            $table->double('nsfs', 2);
            $table->double('n_totals', 2);
            $table->double('ncfk', 2);
            $table->double('nsfk', 2);
            $table->double('ntotalk', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_total');
    }
};
