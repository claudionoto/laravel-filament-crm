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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('username')->nullable();
            $table->text('password');
            $table->text('email')->nullable();
            $table->text('level')->nullable();
            $table->text('surname')->nullable();
            $table->text('agent_code')->nullable();
            $table->integer('area_manager_id')->nullable();
            $table->integer('structure_id')->nullable();
            $table->text('commercial_profile')->nullable();
            $table->text('area')->nullable();
            $table->text('team_leader', 2)->nullable();
            $table->text('assigned_operators')->nullable();
            $table->text('assigned_agents')->nullable();
            $table->text('extractor', 2)->nullable();
            $table->text('enabled', 2)->nullable();
            $table->text('remember_token')->nullable();
            $table->timestamp('last_login_date')->nullable();
            $table->timestamp('last_logout_date')->nullable();
            $table->text('login_ip_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
