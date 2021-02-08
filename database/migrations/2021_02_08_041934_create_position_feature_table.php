<?php

use App\Models\Feature;
use App\Models\Position;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_position', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Position::class);
            $table->foreignIdFor(Feature::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_position');
    }
}
