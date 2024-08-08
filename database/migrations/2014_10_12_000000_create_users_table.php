<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('birthdate')->nullable();
            $table->text('description')->nullable();

            $table->integer('level')->default(0);
            $table->decimal('experience')->default(0);
            $table->decimal('points')->default(0);

            $table->foreignId('role_id')
            ->constrained('roles')
            ->cascadeOnDelete()
            ->restrictOnUpdate()
            ->default(1);

            $table->string('avatar')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('google_id')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
