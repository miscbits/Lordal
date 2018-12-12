<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('name');
            $table->enum('level', ['Quiz', 'Practice', 'Exam', 'Lab']);
            $table->boolean('gradable');
            $table->integer('max_score')->nullable();
            $table->dateTimeTz('assigned_date');
            $table->dateTimeTz('due_date');
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
        Schema::dropIfExists('assessments');
    }
}
