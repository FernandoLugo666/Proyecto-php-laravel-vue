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
        Schema::create('taggables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tag_id')->unsigned(); //unsigned par auqe no tenga valores negativos
            $table->bigInteger('taggable_id')->unsigned(); //unsigned par auqe no tenga valores negativos
            $table->bigInteger('taggable_type')->unsigned(); //unsigned par auqe no tenga valores negativos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taggables');
    }
};
