<?php
namespace App\Http\Controllers\Admin;

use App\Helpers\AjaxRender;
use App\Http\Controllers\Gallery\GalleryController;
use App\Models\Battle;
use Illuminate\Http\Request;

class PhotoController extends GalleryController
{
    public function __construct(Battle $battle, Request $request, AjaxRender $ajaxRender)
    {
        parent::__construct($battle, $request, $ajaxRender);
    }

    public function show()
    {
        return view('admin.gallery', [
            'photo' => $this->allPhoto(
                0, 1, false, $this->request->week ? $this->request->week : 1
            )
        ]);
    }

    /**
     * @return bool
     * назначить победителя
     */
    public function setWinner()
    {
        $result = $this->update(1);

        if ($result) {
            return redirect()->back();
        }
        return abort(500);
    }

    /**
     * @return bool
     * удалить победителя
     */
    public function removeWinner()
    {
        $result = $this->update(0);

        if ($result) {
            return redirect()->back();
        }
        return abort(500);
    }

    /**
     * @param $value
     * @return bool
     * дабы код не повторять
     */
    public function update($value)
    {
        return $this->battle
            ->where('id', $this->request->id)
            ->update([
                'winner' => $value
            ]);
    }
}