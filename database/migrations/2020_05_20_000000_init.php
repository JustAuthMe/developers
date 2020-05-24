<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Init extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable()->default(null);
            $table->string('lastname')->nullable()->default(null);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('jam_id')->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('organization_user', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('organization_id')->nullable()->default(null);
            $table->bigInteger('user_id')->nullable()->default(null);
            $table->integer('role')->default(0)->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->integer('organization_id')->unsigned()->index();
            $table->integer('role');
            $table->timestamp('used_at')->nullable();
            $table->timestamps();
        });
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->integer('remote_resource_id');
            $table->bigInteger('user_id')->nullable()->default(null);
            $table->bigInteger('organization_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('organization_id')->references('id')->on('organizations')->cascadeOnDelete();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('organizations');
        Schema::dropIfExists('organization_user');
        Schema::dropIfExists('invitations');
        Schema::dropIfExists('apps');
    }
}
