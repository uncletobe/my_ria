<div class="auth-window fadeOut">
    <div class="auth-window--block">
        <div class="auth-window__title">
            <h2>Вход на сайт</h2>
        </div>
        <div class="auth-window__body">
            <form>
                {{ csrf_field() }}
                <div class="form-group">
                    <input
                        type="email"
                        name="email"
                        class="form-control form-control-lg"
                        id="authEmail"
                        placeholder="Почта"
                        required="required"
                    />
                </div>
                <div class="form-group">
                    <input
                        type="password"
                        name="password"
                        class="form-control form-control-lg"
                        id="authPassword"
                        placeholder="Пароль"
                        required="required"
                    />
                </div>
                <div class="enter-btn-block">
                    <button type="submit" class="form-btn auth--btn">Войти</button>
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
        <div class="profile-main-loader">
          <div class="loader">
            <svg class="circular-loader"viewBox="25 25 50 50" >
              <circle class="loader-path" cx="50" cy="50" r="20" fill="none" stroke="#70c542" stroke-width="2" />
            </svg>
          </div>
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
                {{ csrf_field() }}
                <div class="form-group email-group">
                    <input 
                        type="email"
                        name="email" 
                        class="form-control form-control-lg" 
                        id="registerEmail"
                        aria-describedby="emailHelp" 
                        placeholder="Почта" 
                        required="required"
                    >
                </div>
                <div class="form-group password-group">
                    <input 
                        type="password"
                        name="password" 
                        class="form-control form-control-lg" 
                        id="registerPassword"
                        placeholder="Пароль" 
                        required="required"
                        minlength="5"
                    >
                </div>
                <div class="enter-btn-block">
                    <button type="submit" class="form-btn register--btn">Зарегистрироваться</button>
                </div>
                <div class="custom-control custom-checkbox agreement">
                    <input 
                        type="checkbox" 
                        class="custom-control-input" 
                        id="agreementCheck" 
                        name="agreementCheck"
                        required="required"
                        value="1" 
                    >
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
        <div class="profile-main-loader">
          <div class="loader">
            <svg class="circular-loader"viewBox="25 25 50 50" >
              <circle class="loader-path" cx="50" cy="50" r="20" fill="none" stroke="#70c542" stroke-width="2" />
            </svg>
          </div>
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
                    <input 
                        type="email"
                        name="email" 
                        class="form-control form-control-lg" 
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp" 
                        placeholder="Почта" 
                        required="required"
                    >
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