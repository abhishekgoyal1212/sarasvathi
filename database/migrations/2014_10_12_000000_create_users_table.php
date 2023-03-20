<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(USERS, function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->string('country_code')->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->date('dob')->nullable();
            $table->string('google_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->string('login_type')->nullable();
            $table->string('role_status')->default(1)->comment('1 = User , 1 = Student');
            $table->string('forget_key')->nullable();
            $table->timestamp('expire_forget_key')->nullable();
            $table->integer('school_id')->default(0)->comment('0 = Registered');
            $table->integer('board_id')->default(0);
            $table->integer('class_id')->default(0);
            $table->integer('exam_id')->default(0);
            $table->integer('user_stream')->default(0)->comment('0 = None , 1 = Science ,2 = Commerce ,3 = Humanities/Arts');
            $table->integer('user_status')->default(1)->comment('0 = Inactive , 1 = Active');
            $table->integer('user_block_status')->default(0)->comment('0 = Active , 1 = Blocked');
            $table->integer('wtsap_notify')->default(0)->comment('0 = NO , 1 = YES');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists(USERS);
    }
}
