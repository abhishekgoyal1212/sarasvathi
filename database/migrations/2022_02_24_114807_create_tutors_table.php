<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TUTOR, function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->string('mobile')->nullable();
            $table->date('dob')->nullable();
            $table->integer('user_status')->nullable();
            $table->integer('user_block_status')->nullable();
            $table->string('forget_key')->nullable();
            $table->timestamp('expire_forget_key')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            // $table->integer('delete_status')->default(0)->comment('0 = Not Deleted , 1 = Deleted');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(TUTOR);
    }
}
