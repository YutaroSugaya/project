<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('companies', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('blog_id');
                $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
                $table->string('company_name');
                $table->string('street_address');
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
        Schema::dropIfExists('companies');
    }
}
