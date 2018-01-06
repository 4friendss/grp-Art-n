<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->date('notification_date')->comment="تاریخ ابلاغ پروژه";
            $table->date('agreement_date')->comment="تاریخ بستن قرارداد پروژه";;
            $table->date('agreement_start_date')->comment="تاریخ شروع پروژه در قرارد";;
            $table->date('agreement_end_date')->comment="تاریخ پایان در قرارداد پروژه";;
            $table->date('real_start_date')->comment="تاریخ شروع واقعی پروژه";;
            $table->date('real_end_date')->comment="زمان خاتمه واقعی پروژه";;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
