<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DYN, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('heading')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->text('urls')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('type')->nullable();
            $table->string('page_name')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DYN);
    }
}
