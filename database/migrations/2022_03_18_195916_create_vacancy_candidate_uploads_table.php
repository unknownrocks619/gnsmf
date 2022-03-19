<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy_candidate_uploads', function (Blueprint $table) {
            $table->id();
            $table->string("title")->comment("limited: ");
            $table->string("slug")->nullable();
            $table->string("vacancy_candidate_id");
            $table->string("remarks")->nullable();
            $table->string("fields")->nullable();
            $table->text("file_detail");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancy_candidate_uploads');
    }
};
