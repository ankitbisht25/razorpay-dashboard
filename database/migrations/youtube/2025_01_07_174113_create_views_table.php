<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->default('1');
            $table->string('views')->nullable();
            $table->string('views_label')->nullable();
            $table->string('watch_hrs')->nullable();
            $table->string('watch_hrs_label')->nullable();
            $table->string('watch_hrs_status')->nullable();
            $table->string('subscribers')->nullable();
            $table->string('subscribers_label')->nullable();
            $table->string('subscribers_status')->nullable();
            $table->string('new_data')->nullable();
            $table->string('new_data_label')->nullable();
            $table->text('views_graph_data')->nullable();
            $table->text('watch_time_graph_data')->nullable();
            $table->text('subscribers_graph_data')->nullable();
            $table->text('new_data_graph_data')->nullable();
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
        Schema::dropIfExists('views');
    }
}
