<?php

namespace App\Http\Controllers\Upload;

use App\Models\Check;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Services\UploadService;
use DateHelper;
use App\Models\Battle;
use Validator;

class CheckUploadController extends Controller
{
    private $battle;
    private $request;
    private $uploadService;
    private $image;
    private $check;

    public function __construct(
        Battle $battle, Request $request, UploadService $uploadService, Check $check
    )
    {
        $this->battle = $battle;
        $this->request = $request;
        $this->uploadService = $uploadService;
        $this->image = $request->file('check');
        $this->check = $check;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|void
     * начинаем загрузку фотографии чека
     */
    public function upload()
    {
        return $this->move();
    }

    /**
     * @return bool
     * проверка политики - если ок то валидация
     */
    private function policy()
    {
        if (policy($this->battle)->check()) {
            return $this->validator()->errors()->all();
        }
        return false;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|void
     * сохранение ины о чеки в бд
     * если ок то добавление фото в таблицу батл
     */
    public function save()
    {
        $save = $this->check->saveCheck($this->request->checked, "img/check/{$this->uploadService->setName()}");
        if ($save) {
            return $this->addToBattle();
        }
        return abort(500);
    }

    /**
     * @return bool|\Illuminate\Http\RedirectResponse
     * проверка типа файла
     */
    private function checkType()
    {
        if (!$this->uploadService->checkType($this->image, $this->request)) {
            return redirect()->back()->with('message', 'Вы пытаетесь загрузить не изображение!');
        }
        return true;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|void
     * загрузка фотки на сервер
     * проверка политики и типа файла
     * если все ок то сохраняем в бд инфу о чеке
     */
    public function move()
    {
        $this->policy();
        $this->checkType();
        $move = $this->uploadService->save('check');
        if ($move) {
            return $this->save();
        }
        return abort(500);
    }

    /**
     * @return mixed
     * валидатор
     */
    public function validator()
    {
        return Validator::make($this->request->all(), [
            'checked' => 'required',
            'check' => 'required'
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|void
     * метод добавления инвы в таблицу батл
     */
    public function addToBattle()
    {
        $add = $this->battle->addToBattle($this->request->checked);
        if ($add) {
            return redirect()->back();
        }
        return abort(500);
    }
}
