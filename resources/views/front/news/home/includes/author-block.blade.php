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
                            <a href={{ url('author-article', [$news->article_slug]) }} class="author-block__body">
                                <div class="author-block__image">
                                    <picture>
                                        <source
                                            media="(min-width: 480px)"
                                            srcset="{{ $news->getPicPathByRes(
                                                $news->article_picture_preview_path, 480
                                            ) }}"
                                        />
                                        <source
                                            media="(min-width: 0px)"
                                            srcset="{{ $news->getPicPathByRes(
                                                $news->article_picture_preview_path, 'min'
                                            ) }}"
                                        />
                                        <img src={{ asset("img/default.jpg") }} alt="" />
                                    </picture>
                                    <span class="author-block__image__info">
                                        {{ $news->article_title }}
                                    </span>
                                </div>
                            </a>
                            <a href="" class="author-block__author-info">
                                <span class="author-info__image">
                                    <img
                                        src="{{ $news->getUserAvatar($news->user->avatar) }}"
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
