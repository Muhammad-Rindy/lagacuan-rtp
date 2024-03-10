<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RandomPrediksi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'random:prediksi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk Random Prediksi';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        randomPasaran();
        return Command::SUCCESS;
    }
}
