<?php

namespace App\Providers;

use App\Handlers\Social\Vk\MyVKSocialite;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            MyVKSocialite::class,
            \JhaoDa\SocialiteProviders\Odnoklassniki\OdnoklassnikiExtendSocialite::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
