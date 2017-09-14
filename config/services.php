<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\Users\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'vkontakte' => [
        'client_id' => env('VKONTAKTE_KEY'),
        'client_secret' => env('VKONTAKTE_SECRET'),
        'redirect' => env('VKONTAKTE_REDIRECT_URI'),
    ],

    'odnoklassniki' => [
        'client_id' => env('ODNOKLASSNIKI_ID'),
        'client_secret' => env('ODNOKLASSNIKI_SECRET'),
        'client_public' => env('ODNOKLASSNIKI_PUBLIC'),
        'redirect' => env('ODNOKLASSNIKI_REDIRECT_URI'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_ID'),
        'client_secret' => env('FACEBOOK_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT_URI'),
    ],

    'moderate' => [
        'Заявка рассматривается',
        'Заявка отклонена',
        'принимает участие в битве'
    ],

    "link" => [
        'vkontakte' => 'https://vk.com/id',
        'facebook' => 'https://www.facebook.com/',
        'odnoklassniki' => 'https://www.facebook.com/',
        'null' => ''
    ],

    "animation" => [
        "анимация 1" => "preview.png",
        "анимация 2" => "preview1.png",
        "анимация 3" => "preview2.png",
        "анимация 4" => "preview4.png"
    ]
];
