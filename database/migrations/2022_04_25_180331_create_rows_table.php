<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRowsTable extends Migration
{


    protected $fillable = ['id','title','column_id'];


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rows', function (Blueprint $table) {
            $table->id();
            $table->integer('column_id');
            $table->string('title');
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
        Schema::dropIfExists('rows');
    }
}
