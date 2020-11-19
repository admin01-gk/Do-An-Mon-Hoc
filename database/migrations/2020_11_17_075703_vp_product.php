<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_product', function (Blueprint $table) {
            $table->id('product_id');
            $table->String('product_name');
            $table->String('product_slug');
            $table->integer('product_price');
            $table->String('product_img');
            $table->String('product_baohanh');
            $table->String('product_phukien');
            $table->String('product_tinhtrang');
            $table->String('product_khuyenmai');
            $table->tinyInteger('product_trangthai');
            $table->text('product_mieuta');
            $table->tinyInteger('product_dacbiet');
            $table->unsignedBigInteger('product_cate');
            $table->timestamps();
        });
        Schema::table('vp_product', function($table) {
            $table->foreign('product_cate')->references('category_id')->on('vp_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vp_product');
    }
}