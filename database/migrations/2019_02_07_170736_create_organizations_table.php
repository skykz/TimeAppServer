<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_of_organization',150);
            $table->string('secondary_name')->nullable();;
            $table->text('full_description');
            $table->integer('price')->nullable();
            $table->integer('status_of_organization')->default('0');
            $table->integer('status_of_article')->nullable();
            $table->integer('used_by_people')->nullable();
            $table->integer('rating')->nullable();
            $table->string('image_main');
            $table->integer('favorite')->nullable();
            $table->string('address_1')->nullable();

            //i will write other stuff
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
        Schema::dropIfExists('organizations');
    }
}
