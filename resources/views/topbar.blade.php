<div class="MENU bg-neutral-300">
    <div>
        <a href="/skynet-laravel/public/">Strona główna</a>
        <a href="{{ route('products') }}">Produkty</a>
    </div>
    @guest
        <div>
            <a href="{{ route('register') }}">Rejestracja</a>
            <a href="{{ route('login') }}">Logowanie</a>
        </div>
    @else
        <div class="logout7">
            <span class="mx-4">Zalogowany jako: 
                <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Wyloguj się</button>
            </form>
        </div>
    @endguest
</div>


<style>
.logout7{
    display: flex;
    align-items: center;
}
.MENU{
    display: flex;
    justify-content: space-between;
    color:black;
    padding: 10px;
    margin-bottom: 10px;
    border-bottom: 1px solid #8e8ee9;
    box-shadow: 0px 4px 8px 1px #8db5c9;
}
a, button{
    background-color: #959595;
    padding: 3px;
    border-radius: 3px;
    transition: 300ms;
}
a:hover, button:hover{
    color: #adadad;
    background-color: #464545;
}
</style>
