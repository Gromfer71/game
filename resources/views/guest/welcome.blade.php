@extends('layouts.header')

@section('content')
    <div class="uk-background-secondary">
        <img class="uk-align-center uk-padding-small" src="{{ asset('img/main.jpg') }}" alt="MainMenuImg">
        <div class="uk-text-bold uk-text-large uk-text-center">
            Добро пожаловать в новую онлайн игру Clash of kings
        </div>
        <button class="uk-button uk-button-primary uk-button-large uk-align-center uk-width-1-2" uk-toggle="target: #modal-login">Вход</button>
        <button class="uk-button uk-button-primary uk-button-large uk-align-center uk-width-1-2" uk-toggle="target: #modal-register">Регистрация</button>
        <br>


        <div id="modal-login" class="uk-modal-full" uk-modal >
            <div class="uk-modal-dialog" style="background: url('../img/bg1.jpg') no-repeat;">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                <div data-uk-img="" data-src="/images/photo2.jpg" class="uk-flex uk-flex-center uk-flex-middle uk-background-cover" uk-height-viewport>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-overlay uk-position-center uk-light">
                        <form action="{{ route('login') }}" method="POST" aria-label="{{ __('Login') }}">
                            @csrf
                            <div class="uk-margin uk-text-uppercase">
                                Авторизация
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                                    <input type="text" name="login" placeholder="Логин" class="uk-input" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <input type="password" name="password" placeholder="Пароль" id="password_input" class="uk-input" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <button class="uk-button uk-button-default" type="submit">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal-register" class="uk-modal-full" uk-modal>
            <div class="uk-modal-dialog" style="background: url('../img/bg1.jpg') no-repeat;">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                <div data-uk-img="" data-src="/images/photo2.jpg" class="uk-flex uk-flex-center uk-flex-middle uk-background-cover" uk-height-viewport>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                    <div class="uk-overlay uk-position-center uk-light">
                        <form action="{{ route('register') }}" method="POST" aria-label="{{ __('Register') }}">
                            @csrf
                            <div class="uk-margin uk-text-uppercase">
                                Регистрация
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                                    <input type="text" name="login" placeholder="Логин" class="uk-input" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <input type="password" name="password" placeholder="Пароль" id="password_input" class="uk-input" required>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <input type="password" name="password_confirmation" placeholder="Повторите пароль" id="password_input" class="uk-input" required>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <button class="uk-button uk-button-default" type="submit">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
