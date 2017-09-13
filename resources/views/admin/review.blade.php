<div class="review" style="clear: both; text-align: center; position: relative">
    <div class="group" style="float: left; margin-right: 50px; width: 45%">
        <label for="img1" style="font-weight: bold; width: 100%">Чек</label> <br>
        <img src="{{ request()->check }}" style="max-width: 600px; max-height: 600px; height: 80%; width: 80%;" id="img1">
    </div>
    <div class="group" style="float: left; width: 45%">
        <label for="img2" style="font-weight: bold; width: 100%">Фото</label> <br>
        <img src="{{ request()->photo }}" style="max-width: 600px; max-height: 600px; height: 80%; width: 80%" id="img2">
    </div>
</div>