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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('semestre');
            $table->integer('volumeHoraire');
            $table->float('effectue')->default(0);
            $table->float('restant')->default(0);
            $table->foreignId('user_id')->constrained()
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
        Schema::table('cours', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('cours');
    }
};
