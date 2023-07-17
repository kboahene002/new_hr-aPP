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
        Schema::create('salary_notches', function (Blueprint $table) {
            $table->id();
            $table->string('currency');
            $table->string('pay_grade');
            $table->integer('level');
            $table->integer('notch_position');
            $table->integer('annual_salary');
            $table->integer('salary_code');
            // $table->integer('notch_code');
            $table->integer('salary_grade_notch_id');
            $table->string('description')->nullable();
            // $table->integer('salary_grade_id');

            // $table->foreign('salary_grade_id')->references('id')->on('salary_grades');
            // $table->foreign('salary_grade_notch_id')->references('id')->on('salary_grade_notches');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_notches');
    }
};
