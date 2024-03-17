<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('school_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->unsignedTinyInteger('status')->default(0)->comment('0:active,1:inactive');
            $table->unsignedTinyInteger('is_deleted')->default(0)->comment('0:not deleted,1:deleted');
            $table->unsignedBigInteger('created_by')->nullable()->comment('User ID of the creator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_subjects');
    }
};
