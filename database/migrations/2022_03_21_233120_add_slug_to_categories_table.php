<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToCategoriesTable extends Migration
{
    public function up()
    {
        $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();
        Schema::table('categories', function (Blueprint $table) use($driver) {
            if ('sqlite' === $driver) {
                $table->string('slug')->default('');
            } else {
                $table->string('slug');
            }
        });

        Category::all()->each(function($category) {
            $category->generateSlug();
            $category->save();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
