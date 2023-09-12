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
        Schema::create('est_programmers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semaine_id')->constrained()
                                            ->onDelete('cascade')
                                            ->onUpdate('cascade');
            $table->foreignId('cour_id')->constrained()
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
            $table->foreignId('classe_id')->constrained()
                                            ->onDelete('cascade')
                                            ->onUpdate('cascade');
            $table->foreignId('salle_id')->constrained()
                                            ->onDelete('cascade')
                                            ->onUpdate('cascade');
            $table->string('jour');
            $table->time('heureDebut');
            $table->time('heureFin');
            $table->string('enseignant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('est_programmers', function (Blueprint $table) {
            $table->dropColumn(['cour_id', 'semaine_id','specialite_id','salle_id']);
        });
        Schema::dropIfExists('est_programmers');
    }
};
