<?php

namespace Todoparrot\Listeners;

use Todoparrot\Events\ListWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogAnotherMessageWhenListCreated
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
     * @param  ListWasCreated  $event
     * @return void
     */
    public function handle(ListWasCreated $event)
    {
        \Log::info("LOG #2 {$event->list->name}");
    }
}
