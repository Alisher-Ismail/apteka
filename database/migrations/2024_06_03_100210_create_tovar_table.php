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
        Schema::create('tovar', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->integer('olingannarx');
            $table->integer('sotilgannarx');
            $table->integer('olchovid');
            $table->string('barcode');
            $table->integer('donasoni');
            $table->integer('dolingannarx');
            $table->integer('dsotilgannarx');
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
        Schema::dropIfExists('tovar');
    }
};
