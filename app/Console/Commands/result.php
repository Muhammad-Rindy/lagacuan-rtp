<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\Shio;
use App\Models\Result as ResultModel;
use App\Library\Telegram;

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
        // $log = new ConsoleOutput();
        $get = Http::get(env("DOMAIN_UTAMA_ACTIVE").'/office/game-oc/game/getNodeInfoList?l=id&parentId=512170');
        $data = $get->object();

        if ($data->code == 200) {
            $data = collect($data->result)->where("nodeName", $lottery)->first();
            if ($data) {
                $number = \Str::of($data->lotteryNodeFetchOutDto->volatility)->split('/,/');
                $n1 = $number[0] ?? null;
                $n2 = $number[1] ?? null;
                $n3 = $number[2] ?? null;

                $twoDigitAngka = substr($n1, -2);

                $shio = Shio::where(function ($query) use ($twoDigitAngka) {
                    $query->whereRaw("FIND_IN_SET('$twoDigitAngka', angka)")
                    ->orWhere('angka', 'LIKE', "%,$twoDigitAngka,%")
                    ->orWhere('angka', 'LIKE', "$twoDigitAngka,%")
                    ->orWhere('angka', 'LIKE', "%,$twoDigitAngka");
                })->first();

                $result = ResultModel::where('pasaran_id', $pasaranid)->whereDate("created_at", Carbon::now())->first();
                if (!$result) $result = new ResultModel;

                $result->pasaran_id = $pasaranid;
                $result->result_1 = $n1;
                $result->result_2 = $n2;
                $result->result_3 = $n3;
                $result->shio = $shio->name;

                $result->save();

                Telegram::sendMessage(Carbon::now()."\nSuccess running command, [pasaran:$lottery][number:$n1,$n2,$n3]");
            }
        }

        $body = json_encode($result);
        // $log->writeln("<info>Socket aktif => $body </info>");
        return Command::SUCCESS;
    }
}
