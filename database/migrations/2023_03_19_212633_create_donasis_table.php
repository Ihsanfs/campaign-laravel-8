<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            // $table->string('pemb_id')->nullable();
            $table->string('nama');
            $table->string('address');
            $table->string('phone');
            $table->string('pembayaran')->nullable();
            $table->integer('jumlah');
            // $table->string('status')->nullable();
            $table->boolean('is_active')->nullable();
            $table->foreignId('campaign_id');
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
        Schema::dropIfExists('donasis');
    }
}
