<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToPostsTable extends Migration
{
    public function up()
    {
        $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();
        Schema::table('posts', function (Blueprint $table) use($driver) {
            if ('sqlite' === $driver) {
                $table->string('slug')->default('');
            } else {
                $table->string('slug');
            }
        });

        Post::all()->each(function($post) {
            $post->generateSlug();
            $post->save();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
