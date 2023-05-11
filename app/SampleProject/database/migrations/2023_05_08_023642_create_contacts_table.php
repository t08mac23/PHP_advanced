<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id')->comment('システムID');
            $table->string('name',50)->nullable(false)->comment('氏名');
            $table->string('kana',50)->nullable(false)->comment('フリガナ');
            $table->string('tel',11)->nullable()->comment('電話番号');
            $table->string('email',100)->nullable(false)->comment('メールアドレス');
            $table->text('body')->nullable()->comment('お問合せ内容');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
