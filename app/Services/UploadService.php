<?php

namespace App\Services;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class UploadService
{
    private $config;
    private $image;
    private $intervention;
    private $request;

    public function __construct(ImageManager $image)
    {
        $this->config = config('mimeImage');
        $this->intervention = $image;
    }

    /**
     * @param $image
     * @param Request $request
     * @return bool
     * проверак типа фотки. если ок то получим фото и реквест
     */
    public function checkType($image, Request $request)
    {
        if (empty($this->config[$image->getClientMimeType()])) {
            return false;
        }
        $this->image = $image;
        $this->request = $request;
        return true;
    }

    /**
     * @param $text
     * @param $waterMask
     * @param $path
     * @return \Intervention\Image\Image
     * наложени еэффектов на фото и сохраниние в папку
     */
    public function filter($text, $waterMask, $path)
    {
        return $this->intervention->make($this->image->getRealPath())
            ->insert(asset($waterMask))
            ->text($text, 300, 600, function($font) {
                $font->file(public_path('fonts/GothaProReg.ttf'));
                $font->size(60);
                $font->color('#000');
            })
            ->save(
                public_path("img/{$path}/{$this->setName()}")
            );
    }

    /**
     * @param $path
     * @return \Intervention\Image\Image
     * сохрание просто фоток без эффекта
     */
    public function save($path)
    {
        $image = $this->intervention->make($this->image->getRealPath());
        return $image->save(
                public_path("img/{$path}/{$this->setName()}")
            );
    }

    /**
     * @return string
     * присвоение имени фотке
     */
    public function setName()
    {
        return "{$this->image->getFilename()}-".
            "{$this->request->user()->id}".
            "{$this->config[$this->image->getClientMimeType()]}";
    }
}