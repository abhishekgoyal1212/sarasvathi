<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CHAPTER, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('class_id')->nullable();
            $table->integer('board_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('exam_id')->nullable();
            $table->integer('uploader_type')->nullable()->comment('1 = Admin , 2 = Tutor ,3 = School');
            $table->integer('uploader_id')->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('slug');
            $table->integer('trending')->default(0);
            $table->integer('status')->default(0)->comment('0 = Inactive , 1 = Active');
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
        Schema::dropIfExists(CHAPTER);
    }
}
