<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswakelas_id');
            $table->integer('Tugas_1')->default(0);
            $table->integer('Tugas_2')->default(0);
            $table->integer('Tugas_3')->default(0);
            $table->integer('Tugas_4')->default(0);
            $table->integer('Tugas_5')->default(0);
            $table->integer('UTS')->default(0);
            $table->integer('UAS')->default(0);
            $table->float('nilai_rapor')->default(0);
            $table->string('keterangan')->nullable();
            $table->foreignId('mapel_id');
            $table->integer('Semester');
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
        Schema::dropIfExists('nilais');
    }
}
