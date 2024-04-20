<div class="MENU">
    <div class="lg1">
        <a href="/skynet-laravel/public/">
            <img src="{{ asset('logo.png') }}" alt="Logo">
        </a>
    </div>

    <div class="lg1">
        <div>
            <img src="{{ asset('icons/brightness-contrast.svg') }}" alt="Rejestracja"
                style="width: 20px; height: 20px; margin-right: 5px;">
            <select id="theme-select">
                <option value="auto">Auto</option>
                <option value="dark">Dark</option>
                <option value="light">Light</option>
            </select>
        </div>
        @guest
            <a class="ow" href="{{ route('register') }}">
                <img src="{{ asset('icons/register.svg') }}" alt="Rejestracja"
                    style="width: 20px; height: 20px; margin-right: 5px;">
                Rejestracja
            </a>
            <a class="ow" href="{{ route('login') }}" title="Logowanie">
                <img src="{{ asset('icons/login.svg') }}" alt="Logowanie"
                    style="width: 20px; height: 20px; margin-right: 5px;">
                Logowanie
            </a>
        @else

            @if (Auth::check())
                <a class="ow mx-4" href="{{ route('announcement.create') }}">
                    <img src="{{ asset('icons/add.svg') }}" alt="Dodaj ogłoszenie"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    Dodaj ogłoszenie
                </a>
            @endif

            <div class="mx-4 userss ow" style="display:flex;">
                @if (Auth::user()->avatar)
                    <img src="{{ asset('users/images/' . Auth::user()->avatar) }}" alt="Avatar"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                @else
                    <img src="{{ asset('users/default.svg') }}" alt="Default Avatar"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                @endif
                <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button class="ow btny" type="submit">
                    <img src="{{ asset('icons/logout.svg') }}" alt="Logout"
                        style="width: 20px; height: 20px; margin-right: 5px;">
                    Wyloguj się</button>
            </form>
        @endguest
    </div>
</div>

<style>
    .userss {
        /* padding-left: 10px;
        padding-right: 10px; */
    }

    .lg1 {
        display: flex;
        align-items: center;
    }

    .lg1>*, .btny {
        margin-left: 4px;
        margin-right: 4px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .MENU {
        display: flex;
        justify-content: space-between;
        color: var(--topbar-font-color);
        background-color: var(--topbar-bg-color);
        padding: 10px;
        margin-bottom: 10px;
        border-bottom: 1px solid #8e8ee9;
        box-shadow: 0px 4px 8px 1px #8db5c9;
    }

    .ow {
        transition: 300ms;
    }

    .ow:hover {
        box-shadow: 0px 0px 9px 0px black;
        padding: 4px;
        border-radius: 4px;
    }

    .ow2 {
        transition: 300ms;
        padding: 4px;
        margin-bottom: 8px;
        margin-left: 8px;
        border-radius: 4px;
        box-shadow: 0px 0px 2px 0px black;
    }

    .ow2:hover {
        box-shadow: 0px 0px 9px 0px black;
        
    }
</style>
