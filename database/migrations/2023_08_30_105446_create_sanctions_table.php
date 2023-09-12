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
        Schema::create('sanctions', function (Blueprint $table) {
            $table->id();
            $table->string('typeSanction');
            $table->date('dateSanction');
            $table->text('justification')->nullable();
            $table->foreignId('cour_id')->constrained()
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
            $table->foreignId('etudiant_id')->constrained()
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
        Schema::table('sanctions', function (Blueprint $table) {
            $table->dropColumn(['cour_id', 'etudiant_id']);
        });
        Schema::dropIfExists('sanctions');
    }
};
