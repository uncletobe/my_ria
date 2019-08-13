<div class="chess-board-block">
    <div class="row justify-content-center d-flex">
        <div class="col-lg-11 col-md-12">
            <div class="row">

                @for($i = 0, $k = 0; $i < 18; $i++, $k++)
                    <div class="col-lg-4 col-md-12 chess-column">
                        <div class="chess-board__cell">
                            @if($k % 2 == 0)
                                <div class="side-articles__item">
                                    <div class="side-articles-item__info">
                                        <span class="item-info__published-time">
                                            {{ $chessBoard[$i]->published_at }}
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
                                    <a href="{{ $chessBoard[$i]->article_slug }}">
                                        <div class="chess-board__cell__body__image">
                                            <picture>
                                                <source media="(min-width: 925px)"
                                                    srcset="https://cdn24.img.ria.ru/images/155607/54/1556075466_14:0:1014:1000_480x0_80_0_0_ceb8d316213db4a6e1d07d869d0848cf.jpg">
                                                <source media="(min-width: 768px)"
                                                    srcset="https://cdn23.img.ria.ru/images/155607/54/1556075466_0:160:1201:460_925x0_80_0_0_ae58c37dfbd8fc9ef89113477715ff63.jpg">
                                                <source media="(min-width: 640px)"
                                                    srcset="https://cdn23.img.ria.ru/images/155607/54/1556075466_0:96:1200:771_768x0_80_0_0_5196d758afbb9a66c246e6c16c38a748.jpg">
                                                <source media="(min-width: 480px)"
                                                    srcset="https://cdn23.img.ria.ru/images/155607/54/1556075466_0:0:1201:900_640x0_80_0_0_95a0d74a45a9a01f0112dc03ffd969fe.jpg">
                                                <source media="(min-width: 0px)"
                                                    srcset="https://cdn24.img.ria.ru/images/155607/54/1556075466_14:0:1014:1000_480x0_80_0_0_ceb8d316213db4a6e1d07d869d0848cf.jpg">
                                                <img src="img/default.jpg" alt="">
                                            </picture>
                                        </div>
                                        <div class="top-news-block__photo__item__title">
                                            <span class="side-articles-item__title">
                                                {{ $chessBoard[$i]->article_excerpt }}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="side-articles__item cell-non-img">
                                    <div class="side-articles-item__info">
                                        <span class="item-info__published-time">
                                            {{ $chessBoard[$i]->published_at }}
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
                                    <a href="{{ $chessBoard[$i]->article_slug }}" class="side-articles__item__body">
                                        <span class="side-articles-item__title">
                                            {{ $chessBoard[$i]->article_excerpt }}
                                        </span>
                                    </a>
                                </div>

                                @php $i++ @endphp

                                <div class="side-articles__item cell-non-img">
                                    <div class="side-articles-item__info">
                                        <span class="item-info__published-time">
                                            {{ $chessBoard[$i]->published_at }}
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
                                    <a href="{{ $chessBoard[$i]->article_slug }}" class="side-articles__item__body">
                                        <span class="side-articles-item__title">
                                            {{ $chessBoard[$i]->article_excerpt }}
                                        </span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </div>
</div>
