<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlFieldToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('url')->nullable();
            $table->text('body')->nullable()->change();
        });

        Post::all()->each(function($post) {
            $post->url = $post->body;
            $post->body = null;
            $post->save();
        });

    }

    public function down()
    {

        Post::all()->each(function($post) {
            $post->body .= $post->url;
            $post->save();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->text('body')->change();
        });
    }
}
