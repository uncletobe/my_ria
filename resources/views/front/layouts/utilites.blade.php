<div class="modal-share-full"></div>

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

<div class="auth-window">
    <div class="auth-window--block">
        <div class="auth-window__title">
            <h2>Вход на сайт</h2>
        </div>
        <div class="auth-window__body">
            <form>
                <div class="form-group">
                    <input
                        type="email"
                        class="form-control form-control-lg"
                        id="exampleInputEmail1"
                        placeholder="Почта"
                        required="required"
                    />
                </div>
                <div class="form-group">
                    <input
                        type="password"
                        class="form-control form-control-lg"
                        id="exampleInputPassword1"
                        placeholder="Пароль"
                        required="required"
                    />
                </div>
                <div class="enter-btn-block">
                    <button type="submit" class="form-btn">Войти</button>
                </div>
            </form>
            <div class="restore-password">
                <a class="restore-password-btn" href="">Восстановить пароль</a>
            </div>
            <div class="auth-social">
                <a href="" class="auth-facebook" title="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="auth-vk" title="">
                    <i class="fab fa-vk"></i>
                </a>
                <a href="" class="auth-ok" title="">
                    <i class="fab fa-odnoklassniki"></i>
                </a>
                <a href="" class="auth-google" title="">
                    <i class="fab fa-google"></i>
                </a>
            </div>
            <div class="register">
                <a href="" class="register-btn">Зарегистрироваться</a>
            </div>
        </div>
        <div class="close-auth-window">
            <i class="fas fa-times"></i>
        </div>
    </div>
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
