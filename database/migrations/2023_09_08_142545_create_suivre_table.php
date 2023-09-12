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
        Schema::create('suivre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cour_id')->constrained()
                                            ->onDelete('cascade')
                                            ->onUpdate('cascade');
            $table->foreignId('classe_id')->constrained()
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
        Schema::table('suivre', function (Blueprint $table) {
            $table->dropColumn(['cour_id', 'classe_id']);
        });
        Schema::dropIfExists('suivre');
    }
};
