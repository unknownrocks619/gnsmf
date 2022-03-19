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
        Schema::create('vacancy_candidates', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string('last_name');
            $table->string("phone_number");
            $table->string("email_address");
            $table->string("status")->default("pending")->comment("Available Options: screened, scheduled, interviewed, selected, rejected.");
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
        Schema::dropIfExists('vacancy_candidates');
    }
};
