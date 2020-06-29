<?php

namespace App\Console;

use App\Console\Commands\ProcessScrappedData;
use App\Console\Commands\ScrapeData;
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
        ProcessScrappedData::class,
        ScrapeData::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->exec('node scrapper/index.js')->dailyAt('02:30');
        $schedule->exec('node scrapper/index2.js')->dailyAt('02:45');
        $schedule->command(ScrapeData::class)->dailyAt('03:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
