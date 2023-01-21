<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->string('invoice_number')->nullable();
            $table->date('invoice_date');
            $table->date('due_date')->nullable();
            $table->integer('subtotal');
            $table->integer('tax')->nullable();
            $table->integer('total');
            $table->longText('notes')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('created_by_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
