<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('start_ups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->comment('Name of the startup');
            $table->text('description')->comment('Description of the startup');
            $table->foreignIdFor(Category::class);
            $table->double('seed_capital')->default(0);
            $table->integer('mvp_deadline')->default(0);
            $table->boolean('public')->default(false);
            $table->string('url')->nullable();
            $table->boolean('sync_in_progress')->default(false);
            $table->foreignIdFor(User::class);
            $table->softDeletes();
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
        Schema::dropIfExists('start_ups');
    }
}
