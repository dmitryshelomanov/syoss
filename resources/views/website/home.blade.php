@extends('website.layouts.app')

@section('content')
<div id="fullpage">
    <div class="section active" id="section0">
        <section>
            <div class="container-flex full-size">
                <div class="slide1 column-xs">
                    <div class="fight align-center"></div>
                    <div class="text-center text">
                        создайтк свой образ <br>
                        получите гифку <br>
                        выграйте имидж-book <br>
                        и шоппинг!*
                    </div>
                    <a href="{{ route('edit') }}">
                        <button class="standart">
                            <span>загрузите фото</span>
                        </button>
                    </a>
                </div>
            </div>
            <footer>
                <div class="bg-products"></div>
                <div class="container-flex">
                    <div class="copy">
                        *Подробная информация об организаторе акции, о порядке ее проведения,
                        количестве призов, сроках, месте и порядке их получения указана в Полных правилах
                    </div>
                    <div class="link">
                        www.henkel 2016 henkel
                    </div>
                </div>
            </footer>
        </section>
    </div>
    <div class="section" id="section1">
        <section>
            <div class="container-flex full-size">
                <div class="path">
                    <div class="box" style="top: 126px; left: -34px">
                        <img src="img/icon3.png" alt="">
                        <span class="up">
                                выберит 1 из 4 образов <br>
                                и просмотрите инструкцию
                            </span>
                    </div>
                    <div class="box" style="top: 120px; left: 118px">
                        <img src="img/icon4.png" alt="">
                        <span class="down">
                                создайте свой образ <br>
                                и загрузите на сайт
                            </span>
                    </div>
                    <div class="box" style="top: -116px; left: 590px">
                        <img src="img/icon1.png" alt="">
                        <span class="up">
                                получите гифку <br>
                                поделитесь с друзьями
                            </span>
                    </div>
                    <div class="box" style="top: -139px; left: 800px">
                        <img src="img/icon2.png" alt="">
                        <span class="down">
                                загрузите чек от покупки <br>
                                выиграйте имидж-book <br>
                                И шоппинг!* <br>
                            </span>
                    </div>
                    <button class="standart path-button">
                        <span>загрузите фото</span>
                    </button>
                </div>
            </div>
            <footer class="footer_without_light">
                <div class="products">
                    <div class="container-flex column container-large">
                        <div class="item-wrapper wrapper-large">
                            <div class="item item-large pesent-width">
                                <h3>романтичная</h3>
                                <img src="img/form4.png" alt="">
                                <div class="play">
                                    <i class="fa fa-play fa-2x"></i>
                                </div>
                            </div>
                            <div class="item item-large pesent-width">
                                <h3>стильная</h3>
                                <img src="img/form3.png" alt="">
                                <div class="play">
                                    <i class="fa fa-play fa-2x"></i>
                                </div>
                            </div>
                            <div class="item item-large pesent-width">
                                <h3>роковая</h3>
                                <img src="img/form2.png" alt="">
                                <div class="play">
                                    <i class="fa fa-play fa-2x"></i>
                                </div>
                            </div>
                            <div class="item item-large pesent-width">
                                <h3>Деловая</h3>
                                <img src="img/form1.png" alt="">
                                <div class="play">
                                    <i class="fa fa-play fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-flex">
                    <div class="copy">
                        *Подробная информация об организаторе акции, о порядке ее проведения,
                        количестве призов, сроках, месте и порядке их получения указана в Полных правилах
                    </div>
                    <div class="link">
                        www.henkel 2016 henkel
                    </div>
                </div>
        </section>
    </div>
    <div class="section" id="section2">
        <section>
            <div class="container-flex flex-center ">
                <div class="promo">
                    <h1>Галлерея работ</h1>
                    <span>
                        Голосуйте за лучшие образы недели! <br>
                        Получите ГИФКУ и примите участие в конкурсе, чтобы выиграть Имидж-book и шоппинг!*
                    </span>
                </div>
            </div>
            <div class="container-flex container-small">
                <div class="item-wrapper wrapper-large wrap">
                    @foreach($photo as $item)
                        <div class="item">
                            <div class="play">
                                <i class="fa fa-play fa-2x popupShow" onclick="popup('{{ $item->photo->link }}', {{ $item->photo->like_count_count }})"></i>
                            </div>
                            <img src="{{ route('resize', ['link' => $item->photo->link, 'x' => 225, 'y' => 225]) }}">
                            <div class="social">
                                <i class="fa fa-vk fw"></i>
                                <i class="fa fa-odnoklassniki fw"></i>
                                <i class="fa fa-facebook fw"></i>
                                @include('website.common.likesBlock')
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container-flex container-small flex-center">
                <a href="{{ route('gallery') }}">
                    <button class="standart margin-null">
                        <span>смотреть все</span>
                    </button>
                </a>
            </div>
            <footer>
                <div class="container-flex">
                    <div class="copy">
                        *Подробная информация об организаторе акции, о порядке ее проведения,
                        количестве призов, сроках, месте и порядке их получения указана в Полных правилах
                    </div>
                    <div class="link">
                        www.henkel 2016 henkel
                    </div>
                </div>
        </section>
    </div>
    <div class="section" id="section3">
        <section>
            <div class="container-flex flex-center column-xs">
                <div class="promo">
                    <h1>победительницы</h1>
                    <span>
                            Поздравляем победительниц Битвы Красоты Syoss! <br>
                            Всем девушкам, кто принял участие в конкурсе спасибо, будем рады увидеть вас снова!
                        </span>
                </div>
                @include('website.common.week')
            </div>
            <div class="container-flex container-small">
                <div class="item-wrapper three-item">
                    <div class="item">
                        <img src="img/300.png">
                        <img src="img/syoss.png" class="fight-flag">
                    </div>
                    <div class="item">
                        <img src="img/300.png">
                        <img src="img/syoss.png" class="fight-flag">
                    </div>
                    <div class="item">
                        <img src="img/300.png">
                        <img src="img/syoss.png" class="fight-flag">
                    </div>
                </div>
            </div>
            <footer class="bottom">
                <div class="bg-products"></div>
                <div class="container-flex">
                    <div class="copy">
                        *Подробная информация об организаторе акции, о порядке ее проведения,
                        количестве призов, сроках, месте и порядке их получения указана в Полных правилах
                    </div>
                    <div class="link">
                        www.henkel 2016 henkel
                    </div>
                </div>
            </footer>
        </section>
    </div>
</div>
@include('website.common.popup')
@endsection