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
                                    <source media="(min-width: 925px)" type="image/jpg"
                                            srcset="{{ $readableArticles[$i]->getPicPathByRes(
                                                $readableArticles[$i]->article_picture_preview_path, 925
                                            ) }}">
                                    <source media="(min-width: 768px)" type="image/jpg"
                                            srcset="{{ $readableArticles[$i]->getPicPathByRes(
                                                $readableArticles[$i]->article_picture_preview_path, 768
                                            ) }}">
                                    <source media="(min-width: 640px)" type="image/jpg"
                                            srcset="{{ $readableArticles[$i]->getPicPathByRes(
                                                $readableArticles[$i]->article_picture_preview_path, 640
                                            ) }}">
                                    <source media="(min-width: 480px)" type="image/jpg"
                                            srcset="{{ $readableArticles[$i]->getPicPathByRes(
                                                $readableArticles[$i]->article_picture_preview_path, 480
                                            ) }}">
                                    <source media="(min-width: 0px)" type="image/jpg"
                                            srcset="{{ $readableArticles[$i]->getPicPathByRes(
                                                $readableArticles[$i]->article_picture_preview_path, 'min'
                                            ) }}">
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






















