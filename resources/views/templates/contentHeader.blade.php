<div class="header__content">
    <div class="header__backButton">
        @if($backUrl == "logout")

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"><img src="{{ asset('img/icons/but_back.png') }}" alt="back"></button>
            </form>
        @elseif($backUrl == '')
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/icons/but_back.png') }}" alt="back">
            </a>
        @else
            <a href="{{ $backUrl }}">
                <img src="{{ asset('img/icons/but_back.png') }}" alt="back">
            </a>
        @endif
    </div>
    <div class="resources">
        <div class="resources__item">
            <img src="{{ asset("img/icons/ui_food.png") }}" alt="foodicon">
            <span>{{ Auth::user()->food }}</span>
        </div>
        <div class="resources__item">
            <img src="{{ asset("img/icons/ui_wood.png") }}" alt="foodicon">
            <span>{{ Auth::user()->wood }}</span>
        </div>
        <div class="resources__item">
            <img src="{{ asset("img/icons/ui_iron.png") }}" alt="foodicon">
            <span>{{ Auth::user()->iron }}</span>
        </div>
        <div class="resources__item">
            <img src="{{ asset("img/icons/ui_mithril.png") }}" alt="foodicon">
            <span>{{ Auth::user()->mithril }}</span>
        </div>
    </div>
    <div class="header__title">
        {{ $title }}
    </div>
</div>


