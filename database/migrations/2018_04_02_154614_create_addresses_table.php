<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('model');
            $table->string('country')->nullable();
            $table->string('role')->default('main');
            $table->string('organization')->nullable();
            $table->string('name_prefix')->nullable();
            $table->string('name_suffix')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('street')->nullable();
            $table->string('building_number')->nullable();
            $table->string('building_flat')->nullable();
            $table->string('city')->nullable();
            $table->string('city_prefix')->nullable();
            $table->string('city_suffix')->nullable();
            $table->string('state')->nullable();
            $table->string('state_code')->nullable();
            $table->string('postcode')->nullable();
            $table->string('phone')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->timestamps();
            $table->unique(['model_id', 'model_type', 'role']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
