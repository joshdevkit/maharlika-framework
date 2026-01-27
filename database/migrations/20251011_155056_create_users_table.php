<?php

use Maharlika\Database\Schema\Migration;
use Maharlika\Database\Schema\Blueprint;
use Maharlika\Facades\Config;
use Maharlika\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable();

            $table->rememberToken();
            $table->datetime('email_verified_at')->nullable();
            $table->timestamps();

            // Add index for faster lookups
            $table->index(['provider', 'provider_id']);
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
            $table->index(['email', 'token']);
        });

        if (app()->isProduction()) {
            Schema::create('blocked_ips', function (Blueprint $table) {
                $table->id();
                $table->string('ip_address', 45)->unique();
                $table->string('ip_hash', 64)->index(); 
                $table->integer('abuse_count')->default(1);
                $table->string('reason')->default('rate_limit_abuse');
                $table->text('user_agent')->nullable();
                $table->string('blocked_route')->nullable();
                $table->timestamp('blocked_at');
                $table->timestamp('expires_at')->index(); 
                $table->timestamp('last_attempt_at')->nullable();
                $table->foreignId('blocked_by')->nullable()->constrained('users')->nullOnDelete(); 
                $table->text('notes')->nullable();
                $table->timestamps();

                // Indexes for efficient queries
                $table->index('blocked_at');
                $table->index(['expires_at', 'ip_hash']);
            });
        }

        if (Config::get('session.driver') === 'database') {
            Schema::create(config('session.table', 'sessions'), function (Blueprint $table) {
                $table->string('id')->primary();
                $table->foreignId('user_id')
                    ->index()
                    ->nullable()
                    ->constrained()
                    ->nullOnDelete();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->longText('payload');
                $table->unsignedInteger('last_activity')->index();
            });
        }

        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts')->default(0);
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->unsignedInteger('failed_at');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('blocked_ips')) {
            Schema::dropIfExists('blocked_ips');
        }
        
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('failed_jobs');
    }
};