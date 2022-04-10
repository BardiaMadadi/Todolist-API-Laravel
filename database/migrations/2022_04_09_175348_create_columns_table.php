<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $fillable = ['title','desc','user_id'];

    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title',30);
            $table->string('desc',255);
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
        Schema::dropIfExists('columns');
    }
}
