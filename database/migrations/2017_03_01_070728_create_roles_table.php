<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('level')->index();
            $table->timestamps();
        });


        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_level')->after('id')->default(1);
            $table->foreign('role_level')->references('level')->on('roles');
        });

    }

        /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //解除外键关联
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_level']);
        });

        Schema::dropIfExists('roles');

    }
}
