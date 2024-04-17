<!-- categories-modal.blade.php -->

<!-- Modal -->
<div id="category-modal" class="modal"
    style="display: none; position: absolute; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); z-index: 1000;">
    <ul style="list-style: none; padding: 0;">
        <li>
            <img src="{{ asset('shop/images/home.png') }}" alt="Ikona domu">
            <span>
                Nieruchomośći
            </span>
        </li>
        <li>
            <img src="{{ asset('shop/images/home.png') }}" alt="Ikona domu">
            <span>
                Motoryzacja
            </span>
        </li>
        <li>
            <img src="{{ asset('shop/images/home.png') }}" alt="Ikona domu">
            <span>
                Praca
            </span>
        </li>
        <li>
            <img src="{{ asset('shop/images/home.png') }}" alt="Ikona domu">
            <span>
                Sztuka
            </span>
        </li>
        <li>
            <img src="{{ asset('shop/images/home.png') }}" alt="Ikona domu">
            <span>
                Randki
            </span>
        </li>
        <li>
            <img src="{{ asset('shop/images/home.png') }}" alt="Ikona domu">
            <span>
                Grupy
            </span>
        </li>
        <li>
            <img src="{{ asset('shop/images/home.png') }}" alt="Ikona domu">
            <span>
                Gry
            </span>
        </li>
        <li>
            <img src="{{ asset('shop/images/home.png') }}" alt="Ikona domu">
            <span>
                Pomagam
            </span>
        </li>
        <li>
            <img src="{{ asset('shop/images/home.png') }}" alt="Ikona domu">
            <span>
                Za darmo
            </span>
        </li>
        <li>
            <img src="{{ asset('shop/images/home.png') }}" alt="Ikona domu">
            <span>
                Inne
            </span>
        </li>
    </ul>
    <button id="hide-category-modal">
        Ukryj kategorie 
        <span title="Zeby zamknąć kategorie możesz kliknąć poza obszarem okna">
            [ ? ]
        </span></button>
</div>

<button id="toggle-category-modal">Pokaż kategorie</button>


<script>
    // Funkcja do przełączania widoczności modala
    function toggleModal() {
        var modal = document.getElementById('category-modal');
        var toggleButton = document.getElementById('toggle-category-modal');
        var hideButton = document.getElementById('hide-category-modal');

        if (modal.style.display === 'none' || modal.style.display === '') {
            modal.style.display = 'block';
            toggleButton.style.display = 'none';
        } else {
            modal.style.display = 'none';
            toggleButton.style.display = 'block';
        }

        if (modal.style.display === 'block') {
            modal.style.animation = 'slideDown 0.3s ease';
        }
    }

    // Funkcja do zamykania modala po kliknięciu poza jego obszarem
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('category-modal');
        var toggleButton = document.getElementById('toggle-category-modal');

        if (event.target !== modal && event.target !== toggleButton) {
            modal.style.display = 'none';
            toggleButton.style.display = 'block';
        }
    });

    // Dodaj obsługę kliknięcia przycisku
    const toggleButton = document.getElementById('toggle-category-modal');
    if (toggleButton) {
        toggleButton.addEventListener('click', toggleModal);
    }
</script>

<style>
    /* Style CSS dla całej strony */
    .categories ul {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        /* Dopasowuje elementy do szerokości ekranu */
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .categories ul li {
        width: calc(25% - 20px);
        /* Szerokość każdego elementu */
        margin: 10px;
        text-align: center;
        /* Wyśrodkowanie tekstu */
        background-color: #f0f0f0;
        /* Kolor tła */
        padding: 10px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        
    }

    @media screen and (max-width: 768px) {
        .categories ul li {
            width: calc(50% - 20px);
            /* Na mniejszych ekranach zmniejsza się szerokość */
        }
    }

    @media screen and (max-width: 480px) {
        .categories ul li {
            width: calc(100% - 20px);
            /* Na bardzo małych ekranach pełna szerokość */
        }
    }
</style>
