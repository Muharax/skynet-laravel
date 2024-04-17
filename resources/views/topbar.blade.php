<div class="MENU">
    <div class="lg1">
        <a href="/skynet-laravel/public/">
            <img src="{{ asset('logo.png') }}" alt="Logo">
        </a>

        <a href="{{ route('products') }}">Produkty</a>
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
            <a href="{{ route('register') }}">
                <img src="{{ asset('icons/register.svg') }}" alt="Rejestracja"
                    style="width: 20px; height: 20px; margin-right: 5px;">
                Rejestracja
            </a>
            <a href="{{ route('login') }}" title="Logowanie">
                <img src="{{ asset('icons/login.svg') }}" alt="Logowanie"
                    style="width: 20px; height: 20px; margin-right: 5px;">
                Logowanie
            </a>
        @else
            <span class="mx-4">Zalogowany jako:
                <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Wyloguj się</button>
            </form>

        @endguest
    </div>
</div>


<style>
    .lg1 {
        display: flex;
        align-items: center;
    }

    .lg1>* {
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

    /* a, button{
    background-color: #959595;
    padding: 3px;
    border-radius: 3px;
    transition: 300ms;
}
a:hover, button:hover{
    color: #adadad;
    background-color: #464545;
} */
</style>
