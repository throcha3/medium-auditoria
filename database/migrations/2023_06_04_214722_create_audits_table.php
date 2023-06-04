<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('event_type');
            $table->integer('model_id')->comment('id in the model\'s table');
            $table->string('table_name', 50)->comment('table which the logged row is in');
            $table->mediumText('old_data',)->comment('original row data');
            $table->mediumText('new_data',)->comment('new row data');
            $table->mediumText('diff_data',)->comment('only what was changed in the row');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
