<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topicID')
                ->constrained('topics')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('takenID')
            ->constrained('taken_subjects')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('type');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('file')->nullable();
            $table->integer('status')->default(1);  //[1] For incomplete [2] complete
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
        Schema::dropIfExists('activities');
    }
}
