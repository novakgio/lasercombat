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
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\TbcPay::class,
        \App\Console\Commands\deactivateSchedules::class,
        
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
                ->everyMinute();

        
        $schedule->command("TbcCheck")->daily();

       
        $schedule->command('sheduledestroy')->dailyAt('01:59')->timezone('Asia/Tbilisi');
    }
}
