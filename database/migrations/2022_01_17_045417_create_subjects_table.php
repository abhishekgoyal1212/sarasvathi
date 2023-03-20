<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SUBJECT, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('slug');
            $table->integer('class_id')->nullable();
            $table->integer('board_id')->nullable();
            $table->integer('exam_id')->nullable();
            $table->integer('uploader_id')->nullable();
            $table->integer('stream_select')->default(0)->comment('0 = None , 1 = Science ,2 = Commerce ,3 = Humanities/Arts');
            $table->integer('uploader_type')->nullable()->comment('1 = Admin , 2 = Tutor ,3 = School/Instructor ');
            $table->string('hexcolor_1')->nullable();
            $table->string('hexcolor_2')->nullable();
            $table->integer('status')->default(0)->comment('0 = Inactive , 1 = Active');
            $table->softDeletes();
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
        Schema::dropIfExists(SUBJECT);
    }
}
