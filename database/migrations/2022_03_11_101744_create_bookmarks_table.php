<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BOOKMARK, function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('chapter_id')->nullable();
            $table->string('lesson_id')->nullable();
            $table->string('concept_id')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->default(1)->comment('1 = Active , 0 = Inactive');
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
        Schema::dropIfExists('bookmarks');
    }
}
