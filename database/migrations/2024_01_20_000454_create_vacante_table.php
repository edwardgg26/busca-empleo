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
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->float('salario',10,2);
            $table->foreignId('moneda_id')->nullable()->constrained('monedas','id')->nullOnDelete();
            $table->foreignId('salario_id')->nullable()->constrained('salarios','id')->nullOnDelete();
            $table->string('empresa');
            $table->date('ultimo_dia')->nullable();
            $table->text('descripcion');
            $table->string('imagen')->nullable();
            $table->integer('publicado')->default(1);
            $table->foreignId('user_id')->constrained('users','id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacantes');
    }
};
