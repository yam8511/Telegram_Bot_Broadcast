<?php

namespace App\Telegram;

use Log;

/**
* Telegram Bot Class
*/
class TeleBot
{
	private $bots = [];
	private $chats = [];

	public function __construct()
	{
		$info = config('telegram');
		$this->bots = $info['bots'];
		$this->chats = $info['chats'];
	}

	public function sendMessage($token, $chatId, $text)
	{
		$curl = curl_init();

		$text = urlencode($text);

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatId}&text={$text}",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "postman-token: 70138ca4-4e7a-008e-978e-628706093819"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  Log::error('Telegram Bot SendMessage Failed!');
		}
	}
}