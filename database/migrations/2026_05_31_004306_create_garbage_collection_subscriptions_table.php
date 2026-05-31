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
        Schema::create('garbage_collection_subscriptions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('resident_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('start_date');

            $table->date('end_date')
                ->nullable();

            $table->enum('frequency', [
                'Diária',
                '3x por Semana',
                'Semanal'
            ]);

            $table->enum('status', [
                'Activo',
                'Suspenso',
                'Cancelado'
            ])->default('Activo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garbage_collection_subscriptions');
    }
};
