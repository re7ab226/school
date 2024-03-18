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
        Schema::create('class_subject', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            $table->integer('subjects_id');
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
        Schema::dropIfExists('class_subject');
    }
};
