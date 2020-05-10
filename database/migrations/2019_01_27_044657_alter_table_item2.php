<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableItem2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item', function (Blueprint $table) {
            $table->foreign('kategori_id')
                ->references('kategori_id')->on('kategori')
                ->onDelete('restrict');

            $table->foreign('merk_id')
                ->references('merk_id')->on('merk')
                ->onDelete('restrict');

            $table->foreign('supplier_id')
                ->references('supplier_id')->on('supplier')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item', function (Blueprint $table) {
            //
        });
    }
}
