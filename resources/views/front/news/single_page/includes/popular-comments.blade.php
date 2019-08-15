@if(count($comments) != 0)
<div class="comments">
    <div class="comments__title">
        <h4>Популярные комментарии</h4>
    </div>
    <div class="row m-0">
        @if(count($comments) == 2) @foreach($comments as $comment)
        <div class="col-md-6">
            <div class="comment-block">
                <div class="comment__body">
                    <p class="comment">
                        {{ $comment->comment_raw }}
                    </p>
                    <span class="comment__time">
                        {{ $comment->updated_at }}
                    </span>
                    <span class="comment_assessments">
                        <div class="comment__like-btn--sm">
                            <svg>
                                <use xlink:href="#like-icon" />
                            </svg>
                        </div>
                        54
                    </span>
                </div>
                <div class="comment__author-block">
                    <a href="/user/{{ $comment->user->id }}">
                        <span class="comment__author__image">
                            <img src="/img/default.jpg" alt="" />
                        </span>
                        <span class="comment-author__name">
                            {{ $comment->user->name }}
                        </span>
                    </a>
                </div>
                <div class="comment__like-btn">
                    <svg>
                        <use xlink:href="#like-icon" />
                    </svg>
                </div>
            </div>
        </div>
        @endforeach @else
        <div class="col-md-12">
            <div class="comment-block">
                <div class="comment__body">
                    <p class="comment">
                        {{ $comments[0]->comment_raw }}
                    </p>
                    <span class="comment__time">
                        {{ $comments[0]->updated_at }}
                    </span>
                    <span class="comment_assessments">
                        <div class="comment__like-btn--sm">
                            <svg>
                                <use xlink:href="#like-icon" />
                            </svg>
                        </div>
                        54
                    </span>
                </div>
                <div class="comment__author-block">
                    <a href="/user/{{ $comments[0]->user->id }}">
                        <span class="comment__author__image">
                            <img src="/img/default.jpg" alt="" />
                        </span>
                        <span class="comment-author__name">
                            {{ $comments[0]->user->name }}
                        </span>
                    </a>
                </div>
                <div class="comment__like-btn">
                    <svg>
                        <use xlink:href="#like-icon" />
                    </svg>
                </div>
            </div>
        </div>
        @endif
    </div>
    <button class="form-btn">Обсудить</button>
</div>
@endif
