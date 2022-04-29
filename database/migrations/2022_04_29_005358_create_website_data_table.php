<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // hasMany versions, misc_meta
        // belongsTo websites
        Schema::create('website_data', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->boolean('isActive')->default(false);
            $table->boolean('isTheme')->default(false);
            $table->text('initVersion')->nullable();
            $table->string('type')->nullable(); // if Theme {parent, child}
            $table->bigInteger('website_id');
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('website_data');
    }
}
