<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();           // regular, student, senior, pwd, ofw
            $table->string('display_name');             // "Regular", "Student", "Senior Citizen"
            $table->text('description')->nullable();

            // Automatic fare discount for this user type
            // e.g. 0.20 = 20% off, 0.00 = no discount
            $table->decimal('discount_rate', 5, 2)->default(0.00);

            // Whether the user must present an ID/document at boarding
            $table->boolean('requires_id')->default(false);
            $table->string('required_document')->nullable(); // "Valid School ID", "Senior Citizen ID"

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Link user_types to users (a user can have one type)
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('user_type_id')
                ->nullable()
                ->after('role')
                ->constrained('user_types')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['user_type_id']);
            $table->dropColumn('user_type_id');
        });

        Schema::dropIfExists('user_types');
    }
};