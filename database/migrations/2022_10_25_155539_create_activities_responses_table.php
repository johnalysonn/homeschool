<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities_responses', function (Blueprint $table) {
            $table->foreignId('activity_id');
            $table->foreignId('student_id');
            $table->boolean('check')->default(0);
            $table->integer('note')->nullable();
            $table->string('filepath');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('activities_responses');
    }
}
