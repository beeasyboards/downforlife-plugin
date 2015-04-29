<?php namespace Bedard\DownForLife\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateHomiesTable extends Migration
{

    public function up()
    {
        Schema::create('bedard_downforlife_homies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('href')->nullable();
            $table->boolean('is_new_window')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bedard_downforlife_homies');
    }

}
