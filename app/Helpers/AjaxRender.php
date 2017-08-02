<?php

namespace App\Helpers;

class AjaxRender
{
    public function render($data, $layout)
    {
        return view("website.ajax.{$layout}", [
            'photo' => $data
        ])->render();
    }
}