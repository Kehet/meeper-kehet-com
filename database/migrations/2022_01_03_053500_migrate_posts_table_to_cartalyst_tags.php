<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigratePostsTableToCartalystTags extends Migration
{
    public function up()
    {
        Post::all()->each(function($post) {
            $post->tag(json_decode($post->tags, true, flags: JSON_THROW_ON_ERROR));
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('tags');
        });
    }

    public function down()
    {
        echo __CLASS__ . ': Not supported';
    }
}
