<a href="https://vk.com/share.php?url={{env('APP_URL')}}/share?img={{env('APP_URL').$item->photo->link }}" target="blank">
    <i class="fa fa-vk fw"></i>
</a>
<a href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl={{env('APP_URL')}}/share?img={{env('APP_URL').$item->photo->link }}" target="blank">
    <i class="fa fa-odnoklassniki fw"></i>
</a>
<a href="https://www.facebook.com/sharer/sharer.php?u={{env('APP_URL')}}share?img={{env('APP_URL').$item->photo->link }}" target="_blank">
    <i class="fa fa-facebook fw"></i>
</a>