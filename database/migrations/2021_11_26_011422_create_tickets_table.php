<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('category_id');
            $table->string('title')->nullable();
            $table->string('ticket_type_id');
            $table->string('details');
            $table->string('attachment')->nullable();
            $table->boolean('ack');
            $table->string('priority_id');
            $table->string('status_id');
            $table->string('ticket_category_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('branch_id');
            $table->string('tracking');
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
        Schema::dropIfExists('tickets');
    }
}
