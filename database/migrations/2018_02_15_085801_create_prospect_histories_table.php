<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospect_histories', function (Blueprint $table) {
            $table->increments('id');

            $table->text('response');
            $table->text('description')->nullable();

            $table->integer('prospect_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();

            $table->foreign('prospect_id')
                ->references('id')
                ->on('prospects')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('prospect_histories');
    }
}
