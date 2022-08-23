<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTagsToPostsTable extends Migration
{
    public function up()
    {
        $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();
        Schema::table('posts', function (Blueprint $table) use ($driver) {
            if ('sqlite' === $driver) {
                $table->json('tags')->default('[]');
            } else {
                $table->json('tags');
            }
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('tags');
        });
    }
}
