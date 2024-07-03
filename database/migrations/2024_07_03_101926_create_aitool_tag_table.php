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
        Schema::create('aitool_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aitool_id')->nullable();
            $table->unsignedBigInteger('tag_id')->nullable();
            
            // nem fog engedni kitörölni egy cimkét, ha vannak aitools kapcsolatok 
            $table->foreign('aitool_id')->references('id')->on('aitools')->onDelete('restrict');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aitool_tag');
    }
};
