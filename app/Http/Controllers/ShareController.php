<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ShareController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function share()
    {
        return  view("share.share", [
            'request' => $this->request
        ]);
    }
}