<?php

namespace Todoparrot\Listeners;

use Todoparrot\Events\ListWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogMessageWhenListCreated
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
        \Log::info("LIST CREATED {$event->list->id}");
    }
}
