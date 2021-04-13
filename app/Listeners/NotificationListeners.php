<?php

namespace App\Listeners;

use App\Events\NOtifiactionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificationListeners
{
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
     * @param  NOtifiactionEvent  $event
     * @return void
     */
    public function handle(NOtifiactionEvent $event)
    {
        //
    }
}
