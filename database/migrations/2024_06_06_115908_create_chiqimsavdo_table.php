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
        Schema::create('chiqimsavdo', function (Blueprint $table) {
            $table->id();
            $table->integer('tovar_id');
            $table->integer('olcham_id');
            $table->integer('miqdori');
            $table->integer('user_id');
            $table->date('date');
            $table->integer('skidka');
            $table->integer('sotildi');
            $table->integer('toliqtulov');
            $table->integer('qarz');
            $table->integer('tolangansumma');
            $table->string('mijoz');
            $table->string('turi');
            $table->string('tolovturi');
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
        Schema::dropIfExists('chiqimsavdo');
    }
};
