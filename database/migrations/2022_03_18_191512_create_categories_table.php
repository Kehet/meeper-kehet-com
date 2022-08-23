<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->timestamps();
        });

        $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();
        Schema::table('posts', function (Blueprint $table) use($driver) {
            if ('sqlite' === $driver) {
                $table->foreignIdFor(\App\Models\Category::class)->default('');
            } else {
                $table->foreignIdFor(\App\Models\Category::class);
            }
        });
    }

    public function down()
    {
        // remove foreign key

        Schema::dropIfExists('categories');
    }
}
