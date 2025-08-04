<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('title'); // Job title
            $table->text('description'); // Job description
            $table->string('location'); // Job location
            $table->enum('type', ['full-time', 'part-time', 'remote']); // Job type
            $table->string('salary'); // Salary for the job
            $table->string('company_name'); // Name of the company;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
