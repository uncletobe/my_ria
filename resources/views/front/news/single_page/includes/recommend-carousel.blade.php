<div class="row m-0">
    <div class="col-12 p-0">
        <div class="recommend-carousel">
            <div class="recommend-carousel__title">
                <h3>Рекомендуем</h3>
            </div>
            <div class="owl-carousel owl-theme" id="recommend-carousel">
                @foreach($recommendCarousel as $item)
                    <div class="item">
                        <a href={{ url('news', [$item->article_slug]) }} class="recommend-carousel__link">
                            <div class="recommend-carousel-item__image">
                                <img src="https://cdn23.img.ria.ru/images/155696/51/1556965115_99:0:2560:1846_360x0_80_0_0_94dba83338eedaaea9c4b2f1be3ec503.jpg"
                                    alt="">
                            </div>
                            <span class="recommend-carousel-item__title">
                                {{ $item->article_title }}
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
