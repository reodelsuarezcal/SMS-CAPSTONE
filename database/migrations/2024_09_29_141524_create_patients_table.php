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
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('patient_id')->unique(); // Unique patient identifier
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable(); // Made this nullable if not always provided
            $table->string('suffix')->nullable(); // Made this nullable if not always provided
            $table->enum('gender', ['Male', 'Female']);
            $table->string('profile_pic')->nullable(); // Made this nullable if not always provided
            $table->date('birthday');
            $table->decimal('height', 4, 2); // Height with up to 4 digits and 2 decimal places
            $table->decimal('weight', 5, 2); // Weight with up to 5 digits and 2 decimal places
            
            // Add foreign key reference to the parents table
            $table->unsignedBigInteger('parent_id')->nullable(); // Assuming parent_id can be nullable
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade'); // Foreign key constraint

            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign(['parent_id']); // Drop the foreign key constraint first
        });
        
        Schema::dropIfExists('patients'); // Then drop the table
    }
};
