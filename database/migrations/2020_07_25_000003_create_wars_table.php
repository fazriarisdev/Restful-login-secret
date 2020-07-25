<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarsTable extends Migration
{
    public function up()
    {
        Schema::create('wars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sales')->nullable();
            $table->string('project_name')->nullable();
            $table->string('city')->nullable();
            $table->string('project_segment')->nullable();
            $table->string('status')->nullable();
            $table->longText('model')->nullable();
            $table->integer('value_project')->nullable();
            $table->date('timeline');
            $table->string('account_type')->nullable();
            $table->string('company_name_partner')->nullable();
            $table->string('pic_name')->nullable();
            $table->string('update')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
