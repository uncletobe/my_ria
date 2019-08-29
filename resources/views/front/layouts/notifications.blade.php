@if(Session::has('succReg'))
    <div class="alert alert-success my-alert alert-dismissible fade show" role="alert">
        Вы успешно зарегистрированы на сайте! Спасибо!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif