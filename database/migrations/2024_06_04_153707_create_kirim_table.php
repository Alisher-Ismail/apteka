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
        Schema::create('kirim', function (Blueprint $table) {
            $table->id();
            $table->integer('tovar_id');
            $table->integer('olcham_id');
            $table->integer('miqdori');
            $table->string('dona');
            $table->date('muddati');
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
        Schema::dropIfExists('kirim');
    }
};
