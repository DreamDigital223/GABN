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
        Schema::create('decoders', function (Blueprint $table) {
            $table->id();
            $table->string('Number', 100);
            $table->unsignedBigInteger('decoder_type_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('shop_id_decoder');
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
        Schema::dropIfExists('decoders');
    }
};
