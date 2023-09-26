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
        Schema::create('enseignes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cour_id')->constrained()
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
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
        Schema::table('enseignes', function (Blueprint $table) {
            $table->dropColumn(['cour_id', 'user_id']);
        });
        Schema::dropIfExists('enseignes');
    }
};
