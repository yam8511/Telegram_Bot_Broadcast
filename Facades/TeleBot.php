<?php 

namespace App\Telegram\Facades;
use Illuminate\Support\Facades\Facade;

class TeleBot extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'telegram_bot';
    }
}