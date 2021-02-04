<nav class="uk-navbar-container uk-box-shadow-xlarge">
    <div class="uk-nav-center uk-background-secondary uk-box-shadow-large uk-border-rounded" >
        <ul class="uk-navbar-nav">
            <li class="uk-parent">
                @if($backUrl == "logout")
                    <form id="logout-form" class="uk-margin-remove-bottom" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="uk-padding-small" uk-icon="icon: sign-out; ratio: 3;"></button>
                    </form>
                @elseif($backUrl == '')
                    <a href="{{ route('home') }}" uk-icon="icon: arrow-left; ratio: 3;">
                    </a>
                @else
                    <a href="{{ $backUrl }}" uk-icon="icon: arrow-left; ratio: 3;">
                    </a>
                @endif
                    <span class="uk-margin-remove-top" uk-icon="location"></span>{{ Auth::user()->login }}
            </li>
            <li class="uk-parent">
                <div class="uk-grid uk-grid-column-small uk-margin-small-top uk-margin-medium-left uk-padding-small">
                    <div>
                        <img src="{{ asset("img/icons/ui_food.png") }}" width="32px" height="32px" alt="foodicon">
                        {{ Auth::user()->food }}
                    </div>
                    <div>
                        <img src="{{ asset("img/icons/ui_wood.png") }}" width="32px" height="32px" alt="foodicon">
                        {{ Auth::user()->wood }}
                    </div>
                    <div>
                        <img src="{{ asset("img/icons/ui_iron.png") }}" width="32px" height="32px" alt="foodicon">
                        {{ Auth::user()->iron }}
                    </div>
                    <div>
                        <img src="{{ asset("img/icons/ui_mithril.png") }}" width="32px" height="32px" alt="foodicon">
                        {{ Auth::user()->mithril }}
                    </div>
                </div>

            </li>

        </ul>
        <div class="uk-card-title uk-margin-remove-top uk-padding-small uk-text-bold">
            {{ $title }}
        </div>
    </div>
</nav>


