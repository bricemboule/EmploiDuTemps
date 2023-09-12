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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->string('code');
            $table->foreignId('niveau_id')->constrained()
                                            ->onDelete('cascade')
                                            ->onUpdate('cascade');
            $table->foreignId('specialite_id')->constrained()
                                                ->onUpdate('cascade')
                                                ->onDelete('cascade');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropColumn(['niveau_id', 'specialite_id']);
        });
        Schema::dropIfExists('classes');
    }
};
