<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('a', 500)->nullable();
            $table->string('b', 500)->nullable();
            $table->string('c', 500)->nullable();
            $table->string('answer', 1000)->nullable();
            $table->boolean('text')->default(false);
            $table->integer('question_id')->foreign()->references('id')
                ->on('questions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('e_options');
    }
}
