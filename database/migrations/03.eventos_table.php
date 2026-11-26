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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id(); 
            $table->user_id();
            $table->varchar("titulo", 150);
            $table->text("descripción");
            $table->datetime("fecha_inicio");
            $table->datetime("fecha_fin");
            $table->varchar("lugar", 150);
            $table->integer("cupo");
            $table->boolean("estado");
            $table->timestamps("created_at");
            $table->timestamps("updated_at");

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
