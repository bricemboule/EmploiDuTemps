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
        Schema::create('specialites', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->foreignId('niveau_id')->constrained()
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::table('specialites', function (Blueprint $table) {
            $table->dropColumn('niveau_id');
        });
        Schema::dropIfExists('specialites');
    }
};
