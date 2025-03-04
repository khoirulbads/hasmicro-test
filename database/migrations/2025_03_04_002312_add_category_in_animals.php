<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::table('animals', function (Blueprint $table) {
        $table->string('category')->nullable();
        $table->text('pattern')->nullable();
    });
}

public function down()
{
    Schema::table('animals', function (Blueprint $table) {
        $table->dropColumn(['category', 'pattern']);
    });
}

};
