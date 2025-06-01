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
        //
        Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        //$table->string('categoria');
        $table->float('precio',10,2);
        $table->float('stock',10,2)->nullable();
        //$table->foreignId('id_categoria')->constrained('categoria');

        $table->timestamps();

    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('productos');

    }
};
