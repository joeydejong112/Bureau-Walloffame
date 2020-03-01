<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{       
    public $test = "https://media.giphy.com/media/l0MYtjhrNDLnlKf28/source.gif";
    public $nogniet = "Nog niet opgegeven";
    public $niks = 0 ;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('background')->default($this->test);
            $table->string('profile_image')->default('defailt.png');
            $table->string('opleiding')->default($this->nogniet);
            $table->string('github')->default('https://github.com/');
            $table->string('gitlab')->default('https://about.gitlab.com/');
            $table->string('linkedin')->default('https://www.linkedin.com/');
            $table->string('klas');
            $table->string('about')->default($this->nogniet);
            $table->string('website')->default($this->nogniet);
            $table->string('contactemail')->default($this->nogniet);
            $table->integer('rank')->default($this->niks);
            $table->boolean('klas_vote')->default($this->niks);
            $table->boolean('global_vote')->default($this->niks);
            $table->timestamps();
        });
        Schema::create('klassen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('klas');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
