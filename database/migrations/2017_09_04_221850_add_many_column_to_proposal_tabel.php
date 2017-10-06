<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddManyColumnToProposalTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->string('status');
            $table->string('nama_proposal');
            $table->string('pemeriksa')->nullable();
            $table->string('jalur');
            $table->string('download_link')->nullable();
            $table->date('waktu_masuk');
            $table->date('waktu_pengecekan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposals', function (Blueprint $table) {
            //
        });
    }
}
