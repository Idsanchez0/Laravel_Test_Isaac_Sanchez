<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePostalTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postal_service', function (Blueprint $table) {
            $table->id('id');
            $table->string('zip_code');
            $table->string('locality');
            $table->timestamps();
            
        });

        Schema::create('federal_entity', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->bigInteger('postal_service_id')->unsigned();
            $table->foreign('postal_service_id')->references('id')->on('postal_service');
            $table->timestamps();
            
        });

            Schema::create('settlement_type', function (Blueprint $table) {
                $table->id('id');
                $table->string('name')->nullable();
                $table->timestamps();
                
            });

        Schema::create('settlements', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('zone_type')->nullable();

            $table->bigInteger('postal_service_id')->unsigned();
            $table->foreign('postal_service_id')->references('id')->on('postal_service');

            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('settlement_type');
            $table->timestamps();
            
        });

           

        Schema::create('municipality', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->bigInteger('postal_service_id')->unsigned();
            $table->foreign('postal_service_id')->references('id')->on('postal_service');
            $table->timestamps();
            
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('postal_service');
       Schema::drop('federal_entity');
       Schema::drop('settlements');
       Schema::drop('settlement_type');
       Schema::drop('municipality');
    }
}
