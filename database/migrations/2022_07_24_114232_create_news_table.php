<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @param $date
     * @return void
     */
    public function up($date)
    {
        Schema::create('news', function (Blueprint $table) use ($date) {
            $table->id()->startingValue(1);
            $table->string('title');
            $table->string('announce');
            $table->string('text');
            $table->timestamps(date("Y-m-d", strtotime($date)));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
