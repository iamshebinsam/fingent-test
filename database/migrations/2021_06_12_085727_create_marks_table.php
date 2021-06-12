<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    public function up(): void
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->integer('science', false, true);
            $table->integer('maths', false, true);
            $table->integer('history', false, true);
            $table->foreignId('term_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->unique(['student_id', 'term_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
}
