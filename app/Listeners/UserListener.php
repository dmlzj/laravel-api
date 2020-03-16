<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\LoginEvent;
use Log;

class UserListener implements ShouldQueue
{
    /**
     * 处理任务的延迟时间.
     *
     * @var int
     */
    public $delay = 60;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        Log::info($event->user . 'event');
    }
}
