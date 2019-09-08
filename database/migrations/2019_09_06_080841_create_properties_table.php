<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('lat');
            $table->string('long');
            $table->string('contact');
            $table->string('dimensionss');
            $table->string('featured');
            $table->string('floors_num');
            $table->string('rooms_num');
            $table->string('baths_num');
            $table->string('price');
            $table->string('will_be_available_on');
            
            $table->text('description');
            $table->text('extra_images')->nullable();
            
            $table->boolean('have_garden');
            $table->boolean('is_price_negotiateable')->default(false);
            
            $table->enum('furniture', ['furnished', 'unfurnished']);
            $table->enum('status', ['pending', 'active', 'refused']);
            $table->enum('finish_type', ['unfinished', 'semi_finished', 'lux', 'super_lux', 'Extra_super_lux']);
            $table->enum('seller_role', ['owner', 'agent']);
            $table->enum('payment_method', ['cach', 'check']);
            

            $table->unsignedBigInteger('property_type_id');
            $table->foreign('property_type_id')->references('id')->on('property_types');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


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
        Schema::dropIfExists('properties');
    }
}
