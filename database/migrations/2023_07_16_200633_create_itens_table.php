<?php

use App\Models\Membro;
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
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string('item_nome');
            $table->double('item_valor');

            $table->unsignedBigInteger('membros_id');
            $table->foreign('membros_id')->references('id')->on('membros')->onDelete('cascade');

            $table->double('membro_valor');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};
