<?php

namespace App\Listeners;

use App\Events\NewCustomerRegistaerEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifiyAdminViaSlack
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    /**
     * Handle the event.
     *
     * @param  NewCustomerRegistaerEvent  $event
     * @return void
     */
    public function handle(NewCustomerRegistaerEvent $event)
    {
        dump('Slack message here');
    }
}
