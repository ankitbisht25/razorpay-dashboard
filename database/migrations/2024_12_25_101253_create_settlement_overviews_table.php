<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlement_overviews', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->default('1');
            $table->decimal('current_balance', 10, 2);
            $table->decimal('settlement_due_today', 10, 2);
            $table->decimal('previous_settlement', 10, 2);
            $table->decimal('upcoming_settlement', 10, 2);
            $table->string('refresh_time')->default('13 mins ago');
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
        Schema::dropIfExists('settlement_overviews');
    }
}
