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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->longText('fiscal_name')->nullable();
            $table->string('fiscal_code')->nullable();
            $table->string('vat')->nullable();
            $table->string('city')->nullable();
            $table->string('mobile')->nullable();
            $table->date('insert_date')->nullable();
            $table->string('zip')->nullable();
            $table->string('state')->nullable();
            $table->string('region')->nullable();
            $table->tinyInteger('confirmed')->nullable();
            $table->datetime('confirmed_at')->nullable();
            $table->text('confirmed_by')->nullable();
            $table->text('name')->nullable();
            $table->text('surname')->nullable();
            $table->text('codice_ateco')->nullable();
            $table->text('pec')->nullable();
            $table->text('codice_univoco')->nullable();
            $table->text('type')->nullable();
            $table->text('deleted_by')->nullable();
            $table->text('insert_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
