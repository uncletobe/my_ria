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
                                    <a href={{ url('news', [$chessBoard[$i]->article_slug]) }}>
                                        <div class="chess-board__cell__body__image">
                                            <picture>
                                                <source media="(min-width: 925px)" type="image/jpg"
                                                        srcset="{{ $chessBoard[$i]->getPicPathByRes(
                                                            $chessBoard[$i]->article_picture_preview_path, 'min'
                                                        ) }}">
                                                <source media="(min-width: 768px)" type="image/jpg"
                                                        srcset="{{ $chessBoard[$i]->getPicPathByRes(
                                                            $chessBoard[$i]->article_picture_preview_path, 768
                                                        ) }}">
                                                <source media="(min-width: 640px)" type="image/jpg"
                                                        srcset="{{ $chessBoard[$i]->getPicPathByRes(
                                                            $chessBoard[$i]->article_picture_preview_path, 640
                                                        ) }}">
                                                <source media="(min-width: 480px)" type="image/jpg"
                                                        srcset="{{ $chessBoard[$i]->getPicPathByRes(
                                                            $chessBoard[$i]->article_picture_preview_path, 480
                                                        ) }}">
                                                <source media="(min-width: 0px)" type="image/jpg"
                                                        srcset="{{ $chessBoard[$i]->getPicPathByRes(
                                                            $chessBoard[$i]->article_picture_preview_path, 'min'
                                                        ) }}">
                                                <img src={{ asset("img/default.jpg") }} alt="">
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
                                    <a href={{ url('news', [$chessBoard[$i]->article_slug]) }} class="side-articles__item__body">
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
                                    <a href={{ url('news', [$chessBoard[$i]->article_slug]) }} class="side-articles__item__body">
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
