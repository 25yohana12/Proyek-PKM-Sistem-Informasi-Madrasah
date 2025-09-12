<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('superadmin', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });
    }
    public function down()
    {
        Schema::table('superadmin', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('role');
        });
    }
};
