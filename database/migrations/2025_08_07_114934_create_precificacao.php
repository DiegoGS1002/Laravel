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
        Schema::create('precificacao', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("sku", 10); // SKU
            $table->string("description", 100); // nome do produto
            $table->decimal("raw_material_cost", 10, 2); // custo mateira prima
            $table->decimal("expense", 5, 2); // despesas %
            $table->decimal("taxes", 5,2)->nullable(); // impostos % (opcional)
            $table->decimal("commission", 5,2)->nullable(); // comissão % (opcional)
            $table->decimal("freight", 5,2)->nullable(); // frete % (opcional)
            $table->decimal("term", 5,2)->nullable(); // prazo 1% ao ano % (opcional)
            $table->decimal("default", 5,2)->nullable(); // inadimplencia % (opcional)
            $table->decimal("assistance", 5,2)->nullable(); // assistencia % (opcional)
            $table->decimal("vpc", 5,2)->nullable(); // vpc % (opcional)
            $table->decimal("profit", 5,2); // lucro %
            $table->decimal("final_value", 10 , 2);// valor final do produto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precificacao');
    }
};
