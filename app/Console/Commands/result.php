<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class result extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'result {lottery} {pasaranid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk result';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lottery = $this->argument('lottery');
        $pasaranid = $this->argument('pasaranid');
        $log = new ConsoleOutput();
        $get = Http::get('https://jederwd.net/office/game-oc/game/getNodeInfoList?l=id&parentId=512170');
        $data = $get->object();
        if ($data->code == 200) {
            // $data = $data->result->where("nodeName", )
        }
        $log->writeln("<info>Socket aktif => $body </info>");
        return Command::SUCCESS;
    }
}
