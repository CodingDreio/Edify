<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakenSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('taken_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pairID')
            ->constrained('tutors')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('subjectID')
            ->constrained('subjects')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('rate')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taken_subjects');
    }
}
