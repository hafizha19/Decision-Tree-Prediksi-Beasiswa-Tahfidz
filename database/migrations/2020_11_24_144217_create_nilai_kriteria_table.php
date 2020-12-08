<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kriteria_1');
            $table->foreign('id_kriteria_1')->references('id')->on('kriteria');
            $table->unsignedBigInteger('id_kriteria_2');
            $table->foreign('id_kriteria_2')->references('id')->on('kriteria');
            $table->string('nilai');
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
        Schema::dropIfExists('nilai_kriteria');
    }
}
