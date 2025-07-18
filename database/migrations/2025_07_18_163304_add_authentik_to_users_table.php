<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('password');

            $table->string('authentik_id')->nullable();
            $table->text('authentik_token')->nullable();
            $table->text('authentik_refresh_token')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable();

            $table->dropColumn('authentik_id');
            $table->dropColumn('authentik_token');
            $table->dropColumn('authentik_refresh_token');
        });
    }
};
