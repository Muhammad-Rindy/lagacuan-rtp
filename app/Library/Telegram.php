<?php

namespace App\Library;

use Illuminate\Support\Facades\Http;
use App\Models\Memo;

/**
* Telegram Library
*
* Make it easy to Sending Telegram Channel Message.
*
* https://core.telegram.org/bots/api
*
* @author cricket <exmadesu@gmail.com>
* @since v1.0 Nov, 2023
*/
class Telegram
{
    /**
     * sendMessage(string $text): Object
     *
     * @param  string  $text   Message Target
     * @return Object          JSON Object
     */
    public static function sendMessage(string $text)
    {
        $telegramURI = sprintf("https://api.telegram.org/bot%s/sendMessage?chat_id=%s&text=%s",
            env('TG_BOT_TOKEN'),
            env('TG_BOT_CHANNEL'),
            urlencode($text)
        );

        return Http::withHeaders(["Content-Type" => "application/json"])
            ->post($telegramURI)
            ->json();
    }
}

/* End of file Telegram.php */
/* Location: ./app/Library/Telegram.php */
