<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('sponsor_id')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->boolean('active_status')->default(1);
            $table->integer('role_id')->default(1);
            $table->integer('rank_id')->default(1);
            $table->boolean('is_online')->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'admin1',
                'sponsor_id' => 0,
                'email' => 'admin1@efgsteps.com', 
                'password' => bcrypt('password'), 
                'role_id' => 3,
                'rank_id' => 3,
                'active_status' => 1,
                'is_online' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'admin2',
                'sponsor_id' => 1,
                'email' => 'admin2@efgsteps.com', 
                'password' => bcrypt('password'), 
                'role_id' => 3,
                'rank_id' => 2,
                'active_status' => 1,
                'is_online' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'user1',
                'sponsor_id' => 2,
                'email' => 'user1@efgsteps.com', 
                'password' => bcrypt('password'), 
                'role_id' => 1,
                'rank_id' => 1,
                'active_status' => 1,
                'is_online' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'user2',
                'sponsor_id' => 3,
                'email' => 'user2@efgsteps.com', 
                'password' => bcrypt('password'), 
                'role_id' => 1,
                'rank_id' => 1,
                'active_status' => 1,
                'is_online' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'user3',
                'sponsor_id' => 3,
                'email' => 'user3@efgsteps.com', 
                'password' => bcrypt('password'), 
                'role_id' => 1,
                'rank_id' => 1,
                'active_status' => 1,
                'is_online' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
            ],
        ]);

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
