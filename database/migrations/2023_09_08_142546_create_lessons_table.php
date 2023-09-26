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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('jour');
            $table->time('debut');
            $table->time('fin');
            $table->foreignId('cour_id')->constrained()
                                            ->onDelete('cascade')
                                            ->onUpdate('cascade');
            $table->foreignId('classe_id')->constrained()
                                            ->onDelete('cascade')
                                            ->onUpdate('cascade');
            $table->foreignId('salle_id')->constrained()
                                            ->onDelete('cascade')
                                            ->onUpdate('cascade');
            $table->foreignId('user_id')->constrained()
                                            ->onDelete('cascade')
                                            ->onUpdate('cascade');
            $table->foreignId('semaine_id')->constrained()
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
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn(['cour_id', 'classe_id', 'salle_id','enseignant_id','semaine_id']);
        });
        Schema::dropIfExists('lessons');
    }
};
