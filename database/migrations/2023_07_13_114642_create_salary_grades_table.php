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
        Schema::create('salary_grades', function (Blueprint $table) {
            $table->id();
            $table->string('pay_grade');
            $table->integer('salary_grade_notch_id');
            $table->string('pay_grade_code');
            $table->integer('level');
            $table->integer('no_of_notches');
            $table->integer('notch_jump');
            $table->integer('leave_days');
            $table->string('description');

            // $table->foreign('salary_grade_notch_id')->references('id')->on('salary_grade_notches');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_grades');
    }
};
