<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Library\Telegram;

class RandomRtp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'random:rtp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk Random RTP';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        randomAll();
        Telegram::sendMessage(Carbon::now()."\nSuccess running command, [random:rtp]");
        return Command::SUCCESS;
    }
}
