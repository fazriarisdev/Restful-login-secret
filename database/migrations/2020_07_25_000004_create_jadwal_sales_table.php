<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalSalesTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_partner');
            $table->string('name_end_user');
            $table->date('date');
            $table->time('time');
            $table->string('agenda');
            $table->string('province');
            $table->string('address');
            $table->longText('meeting_result');
            $table->string('presales_requirement')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
