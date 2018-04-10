<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('for_rent')->nullable();

            $table->text('type')->nullable();
            $table->text('region')->nullable();
            $table->text('city')->nullable();
            $table->text('address')->nullable();
            $table->text('rooms')->nullable();
            $table->text('floors')->nullable();
            $table->text('state')->nullable();
            $table->text('price')->nullable();
            $table->text('description')->nullable();
            $table->text('surface')->nullable();
            $table->text('image')->nullable();

            $table->boolean('garage');
            $table->boolean('terrace');
            $table->boolean('pool');
            $table->boolean('central_heating');
            $table->boolean('drying_room');
            $table->boolean('air_conditioner');
            $table->boolean('gaz_de_ville');
            $table->boolean('ascenceur');
            $table->boolean('cuisine_equipee');
            $table->boolean('salle_de_bain');
            $table->boolean('salle_deau');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('demands');
    }
}
