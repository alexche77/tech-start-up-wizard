<?php

use App\Models\Feature;
use App\Models\StartUp;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesStartupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features_startup', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(StartUp::class)->constrained();
            $table->foreignIdFor(Feature::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features_startup');
    }
}
