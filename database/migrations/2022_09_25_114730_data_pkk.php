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
        Schema::create('data_pkk', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('nik', 50);
            $table->string('alamat', 500);
            $table->string('status', 50);
            $table->string('desa', 100);
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
        Schema::dropIfExists('data_pkk');
    }
};
