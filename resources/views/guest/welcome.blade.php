
@extends('layouts.header')

@section('styles')
    <link href="{{ asset('css/mainmenu.css') }}" rel="stylesheet">
@endsection

@section('content')
            <header>
                <div class="header__date"></div>
                <div class="header__statistic">
                     Регистраций: {{ $usersCount }} Онлайн: {{ $online }}
                </div>
            </header>

            @if($errors->has('login'))

               <div class="error">
                   {{ $errors->first('login')}}

               </div>
            @endif
            @if($errors->has('password'))
                <div class="error">
                    {{ $errors->first('password')}}

                </div>
            @endif


            <div class="content">
                <div class="content__title">
                    Welcome
                </div>
                <div class="content__img">
                    <img src="/img/main.jpg" alt="MainMenuImg">
                </div>
                <div class="content__text">
                <div class="content__texttitle">Добро пожаловать в новую онлайн игру Clash of kings</div>
                    <ul class="ul">
                        <li>Быстрое развитие</li>
                        <li>Независимость от доната</li>
                        <li>Стабильный онлайн</li>
                        <li>Отзывчивая администрация</li>
                        <li>Еженедельные обновления</li>
                    </ul>
                </div>
                <div class="content__links">
                    <a href="#"><div id="welcome" class="links__item"><span>Знакомство с игрой</span></div></a>
                    <a href="#" id="login"><div  class="links__item"><span>Вход</span></div></a>
                    <div class="content__loginform" id="loginform" datavisible="0">
                        <form action="{{ route('login') }}" method="POST" aria-label="{{ __('Login') }}">
                            @csrf
                            <div class="form__item">
                                <label for="login_input" class="form__label">Логин*</label>
                                <input type="text" name="login" placeholder="логин" id="login_input" class="form__input" required >

                            </div>
                            <div class="form__item">
                                <label for="password_input" class="form__label">Пароль*</label>
                                <input type="password"  name="password" placeholder="пароль" id="password_input" class="form__input" required>

                            </div>

                            <button type="submit" class="form__submit">Войти</button>
                        </form>
                    </div>
                    <a href="#"><div id="reg"  class="links__item"><span>Регистрация</span></div></a>
                    <div class="content__regform" datavisible="0">
                        <form action="{{route('register')}}" method="POST">
                            @csrf

                            <div class="form__item">
                                <label for="login_reg"  class="form__label">Логин*</label>
                                <input type="text" name="login" placeholder="логин" id="login_reg" class="form__input" required>
                            </div>
                            <div class="form__item">
                                <label for="password_reg" class="form__label">Пароль*</label>
                                <input type="password"  name="password" placeholder="пароль" id="password_reg" class="form__input" required>
                            </div>
                            <div class="form__item">
                                <label for="login" class="form__label">Еще раз пароль*</label>
                                <input type="password" name="password_confirmation" name="" placeholder="еще раз пароль" id="login" class="form__input" required>
                            </div>

                            <button type="submit" class="form__submit">Регистрация</button>
                        </form>
                    </div>
                </div>
                <div class="content__statistic">
                    <div class="statistic__item"></div>
                    <div class="statistic__item"></div>
                </div>
            </div>
            <footer>
                <div class="footer__gameinfo">
                </div>
            </footer>

<script src="{{ asset('js/mainmenu.js') }}"></script>

@endsection
