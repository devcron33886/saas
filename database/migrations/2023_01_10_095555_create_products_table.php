<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('status')->nullable();
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('created_by_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
