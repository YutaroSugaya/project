<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('blogs', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('image');
                $table->string('productName');
                $table->integer('price');
                $table->integer('stock');
                $table->bigInteger('companie_id')->unsigned();
                $table->foreign('companie_id')->references('id')->on('companies');
                $table->text('content');
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
        Schema::dropIfExists('blogs');
    }
}
