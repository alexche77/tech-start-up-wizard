<?php

use App\Models\Feature;
use App\Models\StartUp;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartUpFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_start_up', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(StartUp::class)->constrained();
            $table->foreignIdFor(Feature::class)->constrained();
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
        Schema::dropIfExists('feature_start_up');
    }
}
