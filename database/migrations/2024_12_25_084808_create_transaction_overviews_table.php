<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_overviews', function (Blueprint $table) {
            $table->id();
            $table->decimal('collected_amount', 10, 2);
            $table->integer('captured_payment');
            $table->decimal('refunds', 10, 2);
            $table->integer('processed');
            $table->decimal('disputes', 10, 2);
            $table->integer('open');
            $table->integer('under_review');
            $table->integer('failed_payments');
            $table->string('duration');
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
        Schema::dropIfExists('transaction_overviews');
    }
}
