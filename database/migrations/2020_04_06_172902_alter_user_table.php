<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE users DROP CONSTRAINT users_group_check");
        DB::statement("ALTER TABLE users ADD CONSTRAINT users_group_check CHECK(users.group IN ('BAF', 'CHAT', 'PW', 'CE', 'NA', 'SACMOVIL'))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
