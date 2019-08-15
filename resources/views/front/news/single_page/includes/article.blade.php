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
                    ><i class="fas fa-eye"></i> {{ $article->views }}</span
                >
            </div>
            <div class="article__body">
                {{ $article->article_content_html }}
            </div>

            <div class="assessment-block">
                <a href="" class="like-icon" data-title="Нравится">
                    <span class="like">
                        <svg>
                            <use xlink:href="#like-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        25
                    </span>
                </a>
                <a href="" class="funny-icon" data-title="Ха-Ха">
                    <span class="funny">
                        <svg>
                            <use xlink:href="#funny-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        32
                    </span>
                </a>
                <a href="" class="amazing-icon" data-title="Удивительно">
                    <span class="amazing">
                        <svg>
                            <use xlink:href="#amazing-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        7
                    </span>
                </a>
                <a href="" class="sad-icon" data-title="Грустно">
                    <span class="sad">
                        <svg>
                            <use xlink:href="#sad-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        5
                    </span>
                </a>
                <a href="" class="angry-icon" data-title="Возмутительно">
                    <span class="angry">
                        <svg>
                            <use xlink:href="#angry-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        3
                    </span>
                </a>
                <a href="" class="unlike-icon" data-title="Не нравится">
                    <span class="unlike">
                        <svg>
                            <use xlink:href="#unlike-icon" />
                        </svg>
                    </span>
                    <span class="count">
                        7
                    </span>
                </a>
            </div>

            @include('front.news.single_page.includes.popular-comments',
            ['comments'])
        </div>
    </div>
</div>
