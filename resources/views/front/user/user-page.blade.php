@section('title')
{{ $user->getUserName() }}
@endsection @extends('front.layouts.master') @section('header')
@include('front.layouts.header-main') @endsection @section('content')
<div class="main-content container under-head">
    <div class="row justify-content-center d-flex">
        <div class="col-xl-12 col-md-12 page profile">

            <div class="profile-head">

                @if(Auth::id() == $user->id)
                    <div class="logout">
                        <a href= {{ url("user/logout") }}>
                            Выйти
                        </a>
                    </div>
                @endif

                <div
                    class="avatar-bg"
                    style="background-image: url({{ $user->avatar }});"
                ></div>

                @if(!empty($user->avatar))
                    <div class="user-avatar">
                        <img src="{{$user->avatar }}" />
                @else
                    <div class="user-avatar" style="background: lavender">
                        {{ $user->getDefaultAvatar() }}
                @endif
                    </div>
            </div>
                <div class="user-name">
                    {{ $user->getUserName() }}
                </div>
                <div class="user-stats">
                    <div class="user-stats__item">
                        <div class="user-stats__item-value">
                            {{ $user->countUserLikes() }}
                        </div>
                        <span>оценок</span>
                    </div>
                    <div class="user-stats__item">
                        <div class="user-stats__item-value">250</div>
                        <span>комментариев</span>
                    </div>
                    <div class="user-stats__item">
                        <div class="user-stats__item-value">
                            {{ $user->getRegisterTime() }}
                        </div>
                        <span>{{ $user->getHowLongRegister() }} на сайте</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection @section('footer')
    <div class="footer container-fluid under-content">
        @include('front.layouts.footer')
    </div>
    @endsection
</div>
