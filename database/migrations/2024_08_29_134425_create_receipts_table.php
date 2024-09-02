<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_type');
            $table->string('series')->nullable();
            $table->string('number');
            $table->date('issue_date');
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            $table->foreignId('record_id')->constrained('records')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
