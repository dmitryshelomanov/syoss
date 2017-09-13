<?php

namespace App\Http\Controllers\Upload;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Photo;
use App\Services\UploadService;
use DateHelper;

class PhotoUploadController extends Controller
{
    private $photo;
    private $image;
    private $request;
    private $uploadService;

    public function __construct(
        Request $request, UploadService $uploadService, Photo $photo
    )
    {
        $this->request = $request;
        $this->image = $request->file('croppedImage');
        $this->uploadService = $uploadService;
        $this->photo = $photo;
    }

    /**
     * @return bool|\Illuminate\Http\JsonResponse
     * проверка политиеи
     */
    private function policy()
    {
        if (policy($this->request->user())->check($this->request->user()) &&
            policy('App\Models\Battle')->check()) {
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * загрузка изогбражения. если ок идет загрузка и запись в бд
     */
    public function upload()
    {
        if ($this->policy()) {
            $this->checkType();
            $this->filter();
            return response()->json(
                $this->save()
            );
        }
        return response()->json('does not upload photo', 500);
    }

    /**
     * @return bool|\Illuminate\Http\JsonResponse
     * проверка типа изображения
     */
    private function checkType()
    {
        if (!$this->uploadService->checkType($this->image, $this->request)) {
            return response()->json('does not valid image type', 500);
        }
        return true;
    }

    /**
     * @return \Intervention\Image\Image
     * фильтр для изображения
     */
    private function filter()
    {
        return $this->uploadService->filter(
            $this->request->text,
            $this->request->animation,
            'uploadPhoto'
        );
    }

    /**
     * @return bool
     * сохраниние в бд
     */
    private function save()
    {
        return $this->photo->savePhoto([
            'link' => "img/uploadPhoto/{$this->uploadService->setName()}",
            'user_id' => $this->request->user()->id,
            'week' => DateHelper::currentStep()
        ]);
    }
}
