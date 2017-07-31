<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ResizeService;

class ResizeController extends Controller
{
    private $request;
    private $resizeService;

    public function __construct(Request $request, ResizeService $resizeService)
    {
        $this->request = $request;
        $this->resizeService = $resizeService;
    }

    /**
     * @return mixed
     * получить заресайзенное изображение
     */
    public function resize()
    {
        return $this->resizeService->resize($this->request);
    }
}
