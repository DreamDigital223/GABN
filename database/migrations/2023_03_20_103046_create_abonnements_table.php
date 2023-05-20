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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->date('StartDate');
            $table->date('EndDate');
            $table->unsignedBigInteger('decoder_id');
            $table->unsignedBigInteger('abonnement_type_id');
            $table->unsignedBigInteger('shop_id_abonnement');
            $table->foreign('decoder_id')->references('id')->on('decoders');
            $table->foreign('abonnement_type_id')->references('id')->on('abonnement_types');
            $table->foreign('shop_id_abonnement')->references('id')->on('shops');
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
        Schema::dropIfExists('abonnements');
    }
};
