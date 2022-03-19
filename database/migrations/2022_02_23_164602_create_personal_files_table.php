<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId("personal_id")->constrained("personals")->cascadeOnDelete();
            $table->string("category")->default('education')->comment("Available Options: education,experence, reference, trainings, others");
            $table->string('file')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('personal_files',function(Blueprint $table){
            $table->dropForeign("personal_id");
        });
    }
}
