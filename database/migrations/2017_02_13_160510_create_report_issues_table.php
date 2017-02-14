<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_id');
            $table->integer('type_id');
            $table->integer('author_id');
            $table->string('title', 255);
            $table->longText('introduction');
            $table->longText('technical_details');
            $table->longText('remediation');
            $table->longText('uploads')->nullable();
            $table->float('cvss', 4,2);
            $table->string('custom_severity', 80)->nullable();
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
        Schema::dropIfExists('report_issues');
    }
}
