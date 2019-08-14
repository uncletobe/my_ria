<div class="row justify-content-center d-flex mb-2">
    <div class="col-lg-11 col-md-12 p-lg-0">
        <div class="news-carousel">
            <div class="owl-carousel owl-theme" id="news-carousel">

                @foreach($newsCarousel as $item)
                    <div class="item">
                        <div class="side-articles-item__info">
                            <span class="item-info__published-time">
                                {{ $item->published_at }}
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
                        <a href="/news/{{ $item->article_slug }}">
                            <img
                                src="https://cdn23.img.ria.ru/images/150843/42/1508434266_0:264:5184:3180_480x0_80_0_0_8de2a3b662cf08dd832a31fb299a3413.jpg"
                                alt=""
                            />
                            <span class="side-articles-item__title">
                                {{ $item->article_excerpt }}
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
