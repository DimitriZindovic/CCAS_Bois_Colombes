<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'domicile_certificate')) {
                $table->dropColumn('domicile_certificate');
            }
            if (Schema::hasColumn('users', 'signature')) {
                $table->dropColumn('signature');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            $table->binary('domicile_certificate')->nullable();
            $table->binary('signature')->nullable();
        });
    }
};
