<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_histories', function (Blueprint $table) {
            $table->increments('id');

            $table->text('response');
            $table->text('description')->nullable();

            $table->integer('customer_id')->unsigned()->index();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
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
        Schema::dropIfExists('customer_histories');
    }
}
