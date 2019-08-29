<div class="modal-share-full"
    @if(Session::has('renewPassToken'))
        style="display: block;"
    @endif
></div>

<div class="share-more-block" data-href="">
    <ul class="share-more-block__list">
        <li>
            <a href="">
                <span class="share-more-block__title">Twitter</span>
                <span class="share-more-block__icon twitter">
                    <i class="fab fa-twitter"></i>
                </span>
            </a>
        </li>
        <li>
            <a href="">
                <span class="share-more-block__title">Facebook</span>
                <span class="share-more-block__icon facebook">
                    <i class="fab fa-facebook"></i>
                </span>
            </a>
        </li>
        <li>
            <a href="">
                <span class="share-more-block__title">ВКонтакте</span>
                <span class="share-more-block__icon vk">
                    <i class="fab fa-vk"></i>
                </span>
            </a>
        </li>
        <li>
            <a href="">
                <span class="share-more-block__title">Одноклассники</span>
                <span class="share-more-block__icon ok">
                    <i class="fab fa-odnoklassniki"></i>
                </span>
            </a>
        </li>
    </ul>
</div>

<div class="search-window">
    <div class="search-window-body">
        <input
            type="text"
            name="search"
            class="input--search"
            placeholder="Поиск"
        />
        <button class="search-btn" type="button">
            <svg>
                <use xlink:href="#header_icon-search" />
            </svg>
        </button>
        <div class="close-search-window">
            &#10005;
        </div>
    </div>
</div>

@yield('utilites')
