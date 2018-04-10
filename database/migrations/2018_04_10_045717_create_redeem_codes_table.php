<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedeemCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeem_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('amount')->nullable();
            $table->integer('user_id');
            $table->integer('doctor_id')->nullable();
            $table->integer('is_used')->default(true);
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
        Schema::dropIfExists('redeem_codes');
    }
}
