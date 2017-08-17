<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasklists', function (Blueprint $table) {
             $table->increments('id');
                $table -> integer('owner_id') -> unsigned() -> default(0);
                $table->foreign('owner_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
                $table->string('title');      
                $table->text('description');
                $table->boolean('completed')->default(false);
                $table->timestamps();  });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasklists');
    }
}
