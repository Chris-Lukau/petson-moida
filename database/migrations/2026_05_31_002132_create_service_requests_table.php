<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {

            $table->id();

            $table->foreignId('service_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('name');

            $table->string('phone');

            $table->string('email')
                  ->nullable();

            $table->string('address')
                  ->nullable();

            $table->text('message')
                  ->nullable();

            $table->enum('status', [
                'Pendente',
                'Em Andamento',
                'Concluído',
                'Cancelado'
            ])->default('Pendente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};