<div class="row justify-content-center d-flex">
    <div class="col-lg-11 col-md-12">
        <div class="top-news-block row">

            <div class="readable-block--2 col-lg-4 col-md-12">
                <div class="side-articles">
                    <div class="side-articles__title">
                        <span>Читаемое</span>
                    </div>
                    @for($i = 2; $i < 7; $i++)
                        <div class="side-articles__item">
                            <div class="side-articles-item__info">
                                <span class="item-info__published-time">
                                    {{ $readableArticles[$i]->published_at }}
                                </span>
                                <span class="item-info__share">
                                    <a href="#" data-name="twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" data-name="facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="#" data-name="vkontakte">
                                        <i class="fab fa-vk"></i>
                                    </a>
                                    <a href="#" data-name="share-more">
                                        <i class="fas fa-ellipsis-h fa-xs"></i>
                                    </a>
                                </span>
                                <span class="more">
                                    <svg>
                                        <use xlink:href="#icon-share" />
                                    </svg>
                                </span>
                            </div>
                            <a href="/news/{{ $readableArticles[$i]->article_slug }}" class="side-articles__item__body">
                                <span class="side-articles-item__title">
                                    {{ $readableArticles[$i]->article_title }}
                                </span>
                            </a>
                        </div>
                    @endfor

                </div>
            </div>

            <div class="top-news-block__photo--2 col-lg-8 col-md-12">
                @for($i = 0; $i < 2; $i++)
                    <div class="top-news-block__photo__item">
                        <a href="/news/{{ $readableArticles[$i]->article_slug }}">
                            <div class="top-news-block__photo__item__title">
                                <span>
                                    {{ $readableArticles[$i]->article_excerpt }}
                                </span>
                            </div>
                            <div class="top-news-block__photo__item__image">
                                <picture>
                                    <source media="(min-width: 925px)"
                                        srcset="https://cdn25.img.ria.ru/images/155609/13/1556091303_0:0:3254:1830_925x0_80_0_0_5094ffb7ce37f8a920ad9a01a21ce9b0.jpg">
                                    <source media="(min-width: 768px)"
                                        srcset="https://cdn23.img.ria.ru/images/155609/13/1556091303_0:292:3254:1106_925x0_80_0_0_ccd4b330c1b4d7a561535b73c77bfa1e.jpg">
                                    <source media="(min-width: 640px)"
                                        srcset="https://cdn25.img.ria.ru/images/155609/13/1556091303_0:0:3254:1830_768x0_80_0_0_f211fb6df72f451d944e552e0d97a3db.jpg">
                                    <source media="(min-width: 480px)"
                                        srcset="https://cdn23.img.ria.ru/images/155609/13/1556091303_330:0:3061:2048_640x0_80_0_0_611ad7019ea606f9388ab208fc4f4078.jpg">
                                    <source media="(min-width: 0px)"
                                        srcset="https://cdn22.img.ria.ru/images/155609/13/1556091303_678:170:2538:2030_480x0_80_0_0_e597528170f18cd708bfad5d6eea0f51.jpg">
                                    <img src="img/default.jpg" alt="">
                                </picture>
                            </div>
                        </a>
                        <div class="item-info-block">
                            <span class="item-info__published-time">
                                {{ $readableArticles[$i]->published_at }}
                            </span>
                            <span class="item-info__share">
                                <a href="#" data-name="twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" data-name="facebook">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="#" data-name="vkontakte">
                                    <i class="fab fa-vk"></i>
                                </a>
                                <a href="#" data-name="share-more">
                                    <i class="fas fa-ellipsis-h fa-xs"></i>
                                </a>
                            </span>
                            <span class="more">
                                <svg>
                                    <use xlink:href="#icon-share" />
                                </svg>
                            </span>
                        </div>
                    </div>
                @endfor

            </div>

        </div>
    </div>
</div>






















