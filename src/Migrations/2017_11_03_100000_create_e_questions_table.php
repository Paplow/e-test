<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question', 1000);
            $table->enum('type', ['text', 'checkbox', 'radio']);
            $table->integer('subject_id')->foreign()->references('id')
                ->on('subjects')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('e_questions');
    }
}
