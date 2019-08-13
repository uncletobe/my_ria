<div class="row justify-content-center m-0 mb-3">
    <div class="col-lg-11 col-md-12 p-lg-0">
        <div class="row">
            <div class="author-block">

            @foreach($authorNews as $news)
                    <div class="col-lg-4 col-md-12 p-0">
                        <div class="author-block__item">
                            <div class="side-articles-item__info">
                                <span class="item-info__published-time">
                                    {{ $news->published_at }}
                                </span>
                                <span class="item-info__share">
                                    <a href="{{ $news->article_slug }}" data-name="twitter">
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
                            <a href="{{ $news->article_slug }}" class="author-block__body">
                                <div class="author-block__image">
                                    <picture>
                                        <source
                                            media="(min-width: 480px)"
                                            srcset="https://cdn21.img.ria.ru/images/155627/00/1556270064_0:186:3106:1933_480x0_80_0_0_de5abe3c8d0031c80dd4fc532a61b4f7.jpg"
                                        />
                                        <source
                                            media="(min-width: 0px)"
                                            srcset="https://cdn23.img.ria.ru/images/155627/00/1556270064_375:0:3106:2048_480x0_80_0_0_aa45a3def432b7d226454bf8feb4ebce.jpg"
                                        />
                                        <img src="img/default.jpg" alt="" />
                                    </picture>
                                    <span class="author-block__image__info">
                                        {{ $news->article_title }}
                                    </span>
                                </div>
                            </a>
                            <a href="" class="author-block__author-info">
                                <span class="author-info__image">
                                    <img
                                        src="https://cdn23.img.ria.ru/images/149146/47/1491464723_169:0:635:464_100x100_80_0_0_0d0a8dc8ee18d16fcff91bf773c34b68.jpg"
                                        alt=""
                                    />
                                </span>
                                <span class="author-info__name">
                                    {{ $news->user->name }}
                                </span>
                            </a>
                        </div>
                    </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
