<?php

/**
 * -----------------------------------------------------------------------------
 * Application Task Scheduler
 * -----------------------------------------------------------------------------
 *
 * This file defines scheduled background jobs executed by the framework’s
 * internal scheduler. Tasks declared here are intended to run automatically
 * at predefined intervals without direct user interaction.
 *
 * Responsibilities:
 * - Register recurring application jobs
 * - Execute maintenance, reporting, and monitoring tasks
 * - Centralize non-HTTP background logic
 *
 * Design Notes:
 * - Tasks MUST be idempotent and safe to run repeatedly.
 * - Long-running or heavy operations should be carefully reviewed to
 *   avoid performance degradation.
 * - Logging should be concise and structured for observability.
 *
 * Important:
 * - This file is loaded during the schedules lifecycle.
 * - DO NOT delete or rename this file.
 * - DO NOT place request/response or UI-related logic here.
 *
 * @package App\Schedules
 */

namespace App\Schedules;

use Maharlika\Facades\Log;
use Maharlika\Facades\DB;
use Maharlika\Facades\Scheduler;

// Log all users
Scheduler::call(function () {
    try {
        // Get all users from database using DB facade
        $users = DB::table('users')->get();
        // Log user count
        Log::info('Daily user report', [
            'total_users' => $users->count(),
            'timestamp' => date('Y-m-d H:i:s')
        ]);

        // Log each user (be careful with large user bases)
        foreach ($users as $user) {
            Log::info('User record', [
                'id' => $user->id,
                'name' => $user->name ?? 'N/A',
                'email' => $user->email,
                'created_at' => $user->created_at ?? null,
            ]);
        }


        Log::info('Daily user logging completed successfully');
    } catch (\Exception $e) {
        Log::error('Failed to log users', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
    }
})->everyMinute()
    ->description('Log all users daily');

// Log user statistics (fixed to work with your actual table structure)
Scheduler::call(function () {
    try {
        // Get user statistics using DB facade
        $totalUsers = DB::table('users')->count();

        // Only query columns that exist in your table
        // Removed last_login_at check since the column doesn't exist
        $newUsersToday = DB::table('users')
            ->whereDate('created_at', date('Y-m-d'))
            ->count();

        // Log statistics
        Log::info('Daily user statistics', [
            'total_users' => $totalUsers,
            'new_users_today' => $newUsersToday,
            'date' => date('Y-m-d'),
        ]);
    } catch (\Exception $e) {
        Log::error('Failed to log user statistics', [
            'error' => $e->getMessage()
        ]);
    }
})->everyMinute()
    ->description('Log daily user statistics');
