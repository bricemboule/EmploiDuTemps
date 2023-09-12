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
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->text('contenu');
            $table->date('dateSeance');
            $table->string('heureDebut');
            $table->string('heureFin');
            $table->float('duree');
            $table->boolean('status')->default(false);
            $table->foreignId('cour_id')->constrained()
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
        Schema::table('seances', function (Blueprint $table) {
            $table->dropColumn('cour_id');
        });
        Schema::dropIfExists('seances');
    }
};
