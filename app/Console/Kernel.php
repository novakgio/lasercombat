<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        'App\Console\Commands\Inspire',
        'App\Console\Commands\TbcPay',
        'App\Console\Commands\deactivateSchedules'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                ->hourly();

        $schedule->command('TbcCheck')
                ->hourly();

        $schedule->command('sheduledestroy')
            ->dailyAt('02:00')->timezone('Asia/Tbilisi');
    }
}
