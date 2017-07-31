<?php

namespace App\Services;

use Intervention\Image\ImageManager as Image;
use Storage;
class ResizeService
{
    private $intervention;

    public function __construct(Image $imageManager)
    {
        $this->intervention = $imageManager;
    }

    public function resize($request)
    {
//        dd(Storage::exists(asset($request->link)));
        if (file_exists($request->link)) {
            return $this->intervention
                ->make(asset($request->link))
                ->resize($request->x, $request->y)
                ->response();
        }
        return abort(404);
    }
}