<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {

            if (!Schema::hasColumn('employees', 'service_id')) {

                $table->foreignId('service_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {

            if (Schema::hasColumn('employees', 'service_id')) {

                $table->dropForeign(['service_id']);
                $table->dropColumn('service_id');
            }
        });
    }
};