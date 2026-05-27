<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Adicionar a coluna service_id
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            
            // Remover a coluna service antiga
            $table->dropColumn('service');
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Reverter: remover service_id
            $table->dropForeign(['service_id']);
            $table->dropColumn('service_id');
            
            // Recriar a coluna service
            $table->string('service')->nullable();
        });
    }
};