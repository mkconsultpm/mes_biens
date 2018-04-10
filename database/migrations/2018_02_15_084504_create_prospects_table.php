<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->increments('id');

            $table->text('first_name');
            $table->text('last_name');
            $table->text('information');
            $table->text('cin')->nullable();
            $table->text('phone');
            $table->boolean('status');

            $table->integer('excel_file_id')->unsigned()->index();

            $table->foreign('excel_file_id')
                ->references('id')
                ->on('excel_files')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prospects');
    }
}
