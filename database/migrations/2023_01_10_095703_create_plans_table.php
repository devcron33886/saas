<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('price')->unique();
            $table->string('stripe_identifier')->unique();
            $table->string('billing_period');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
