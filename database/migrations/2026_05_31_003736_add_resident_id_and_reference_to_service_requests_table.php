<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_requests', function (Blueprint $table) {

            $table->foreignId('resident_id')
                ->nullable()
                ->after('service_id')
                ->constrained('residents')
                ->nullOnDelete();

            $table->string('reference')
                ->nullable()
                ->after('address');

        });
    }

    public function down(): void
    {
        Schema::table('service_requests', function (Blueprint $table) {

            $table->dropForeign(['resident_id']);

            $table->dropColumn([
                'resident_id',
                'reference'
            ]);

        });
    }
};