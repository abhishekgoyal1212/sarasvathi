<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CONCEPT, function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('content')->nullable();
            $table->integer('concept_type')->default(0)->comment('0 = example , 1 = definition , 3=formala ,4= result');
            $table->string('slug');
            $table->integer('subject_id')->nullable();
            $table->integer('chapter_id')->nullable();
            $table->string('file')->nullable();
            $table->string('file_2')->nullable();
            $table->softDeletes();
            $table->integer('status')->default(0)->comment('0 = Inactive , 1 = Active');
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
        Schema::dropIfExists(CONCEPT);
    }
}
