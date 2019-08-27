<div class="row justify-content-center d-flex">
    <div class="col-xl-8 col-md-9">
        <div class="article">
            <div class="brand-logo">
                <a href="/">
                    <svg>
                        <use xlink:href="#logo-ria" />
                    </svg>
                </a>
            </div>
            <div class="article__title">
                <h2>{{ $article->article_title }}</h2>
            </div>
            <div class="article__info">
                <span class="article-time">
                    {{ $article->published_at }}
                </span>
                <span class="article-views"
                    ><i class="fas fa-eye"></i> {{ $article->getViews() }}</span
                >
            </div>
            <div class="article__body">
                {{ $article->article_content_html }}
            </div>

            <div class="assessment-block">
                <a class="like-icon" data-title="Нравится">
                    <span class="like">
                        <svg>
                            <use xlink:href="#like-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        {{ $article->getCountEmotion('like') }}
                    </span>
                </a>
                <a class="funny-icon" data-title="Ха-Ха">
                    <span class="funny">
                        <svg>
                            <use xlink:href="#funny-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        {{ $article->getCountEmotion('funny') }}
                    </span>
                </a>
                <a class="amazing-icon" data-title="Удивительно">
                    <span class="amazing">
                        <svg>
                            <use xlink:href="#amazing-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        {{ $article->getCountEmotion('amazing') }}
                    </span>
                </a>
                <a class="sad-icon" data-title="Грустно">
                    <span class="sad">
                        <svg>
                            <use xlink:href="#sad-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        {{ $article->getCountEmotion('sad') }}
                    </span>
                </a>
                <a class="angry-icon" data-title="Возмутительно">
                    <span class="angry">
                        <svg>
                            <use xlink:href="#angry-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        {{ $article->getCountEmotion('angry') }}
                    </span>
                </a>
                <a class="unlike-icon" data-title="Не нравится">
                    <span class="unlike">
                        <svg>
                            <use xlink:href="#unlike-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        {{ $article->getCountEmotion('unlike') }}
                    </span>
                </a>
            </div>

            @if(!empty($tags))
                <div class="article-tags-block">

                    @foreach($tags as $tag)
                        <a href="/category/{{ $tag[0]->category_slug }}">
                            {{ $tag[0]->category_title }}
                        </a>
                        @foreach($tag as $subtag)
                            <a href="/tag/{{ $subtag->tag_slug }}">
                                {{ $subtag->tag_title }}
                            </a>
                        @endforeach
                    @endforeach

                </div>
            @endif

            @include('front.news.single_page.includes.popular-comments',
            ['comments'])
        </div>
    </div>
</div>
