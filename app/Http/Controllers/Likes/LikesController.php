<?php

namespace App\Http\Controllers\Likes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Likes;

class LikesController extends Controller
{
    private $request;
    private $likes;
    private $policyServices;

    public function __construct(Request $request, Likes $likes)
    {
        $this->request = $request;
        $this->likes = $likes;
    }

    /**
     * @param $type
     * @param $user
     * @param $photo_id
     * @return \Illuminate\Http\JsonResponse|bool
     * юзаем политику для проверки возможно поставить лайк и на оборот
     */
    public function policy($type, $user, $photo_id)
    {
        $result = policy($this->likes)->$type(
            $user, $photo_id
        );
        if ($this->request->ajax() && $result) {
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * ставим лайк
     */
    public function setLike()
    {
        $policy = $this->policy(
            'setLike', $this->request->user(), $this->request->photo_id
        );
        if (!$policy) {
            return response()->json('you does not execute this action', 201);
        }
        $like = $this->likes->setLike(
            $this->request->user()->id,
            $this->request->photo_id
        );
        if ($like) {
            return response()->json('like is set', 200);
        }
        return response()->json('error', 500);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * убираем лайк
     */
    public function unSetLike()
    {
        $policy = $this->policy(
            'unSetLike', $this->request->user(), $this->request->photo_id
        );
        if (!$policy) {
            return response()->json('you does not execute this action', 201);
        }
        $like = $this->likes->unSetLike(
            $this->request->user()->id,
            $this->request->photo_id
        );
        if ($like) {
            return response()->json('like is unset', 200);
        }
        return response()->json('error', 500);
    }
}
