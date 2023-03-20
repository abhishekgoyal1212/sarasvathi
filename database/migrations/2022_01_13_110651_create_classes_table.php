<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CLASSES, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            // $table->integer('uploader_id')->nullable();
            // $table->integer('uploader_type')->nullable()->comment('1 = Admin , 2 = Tutor ,3 = School ');
            $table->string('slug')->nullable();
            // $table->string('stream_select')->nullable();
            $table->integer('above_10')->default(0)->comment('0 = no , 1 = yes');
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
        Schema::dropIfExists(CLASSES);
    }
}
