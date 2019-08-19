<div class="auth-window fadeOut">
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

<div class="register-window fadeOut">
    <div class="register-window--block">
        <div class="register-window__title">
            <h2>Регистрация</h2>
        </div>
        <div class="register-window__body">
            <form>
                <div class="form-group">
                    <input type="email" class="is-valid form-control form-control-lg" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Почта" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg is-invalid" id="exampleInputPassword1"
                           placeholder="Пароль" required="required">
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
                <div class="enter-btn-block">
                    <button type="submit" class="form-btn">Зарегистрироваться</button>
                </div>
                <div class="custom-control custom-checkbox agreement">
                    <input type="checkbox" class="custom-control-input" id="agreementCheck" required="required">
                    <label class="custom-control-label" for="agreementCheck">
                        Я принимаю условия
                        <a href="">соглашения</a>
                    </label>
                </div>
            </form>
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
            <div class="auth">
                <a href="" class="auth-btn">Войти с логином и паролем</a>
            </div>
        </div>
        <div class="close-auth-window">
            <i class="fas fa-times"></i>
        </div>
    </div>
</div>

<div class="restore-window fadeOut">
    <div class="restore-window--block">
        <div class="restore-window__title">
            <h2>Восстановление пароля</h2>
        </div>
        <div class="restore-window__body">
            <form>
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Почта" required="required">
                </div>
                <div class="restore-btn-block">
                    <button type="submit" class="form-btn">Восстановить</button>
                </div>
            </form>
            <div class="back-block">
                <a class="form-btn-back" href="">Назад</a>
            </div>
        </div>
        <div class="close-auth-window fadeOut">
            <i class="fas fa-times"></i>
        </div>
    </div>
</div>