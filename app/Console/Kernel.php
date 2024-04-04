<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Jadwal;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('random:prediksi')->daily();
        $schedule->command('random:rtp')->hourly();

        $jadwal = Jadwal::with('pasaran')->get();
        foreach ($jadwal as $item) {
            $lottery = $item->pasaran->alias;
            $pasaranid = $item->pasaran->id;
            $t = Carbon::parse($item->jadwal_undi)->addMinutes(15)->format("H:i");
            $schedule->command("random:result '$lottery' $pasaranid")->dailyAt($t);
        }
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
