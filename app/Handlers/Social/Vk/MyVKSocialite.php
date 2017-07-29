<?php

namespace App\Handlers\Social\Vk;

use SocialiteProviders\Manager\SocialiteWasCalled;

class MyVKSocialite
{
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite(
            'vkontakte', MyVkProvider::class
        );
    }
}