<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // Tên mã giảm giá
            $table->text('slug'); // slug mã giảm giá
            $table->integer('number'); // số tiền hoặc số % giảm
            $table->integer('time'); // số lần giảm
            $table->string('code'); // mã giảm
            $table->integer('condition'); // điều kiện giảm

            $table->softDeletes();

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
        Schema::dropIfExists('coupons');
    }
}
