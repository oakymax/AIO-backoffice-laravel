<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Создание таблицы контрагентов
 */
return new class extends Migration
{

    public function up(): void
    {
        Schema::create('fresh_contractors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name')->nullable(false);
            $table->string('inn')->nullable(false)->unique();
            $table->string('legal_form')->nullable(false);
            $table->string('role')->nullable();

            $table->string('ord_id')->nullable();
            $table->jsonb('ord_states')->default(DB::raw("'{}'::jsonb"))->nullable(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fresh_contractors');
    }
};
