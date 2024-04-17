@include('layouts.header')
@include('topbar')

<div class="MAIN">
    {{-- Górny pasek z kategoriami --}}
    <div class="categories">
        @include('shop.shop')
      
    </div>

    {{-- Sekcja ogłoszeń promowanych --}}
    <div class="promoted-ads">
        {{-- Tutaj umieść ogłoszenia promowane --}}
        <h2>Ogłoszenia promowane</h2>
        <div class="ads-grid">
            {{-- Przykładowe ogłoszenia --}}
            <div class="ad">Ogłoszenie 1</div>
            <div class="ad">Ogłoszenie 2</div>
            <div class="ad">Ogłoszenie 3</div>
            <div class="ad">Ogłoszenie 4</div>
            <div class="ad">Ogłoszenie 5</div>
            <div class="ad">Ogłoszenie 6</div>
        </div>
    </div>

    {{-- Sekcja ogłoszeń lokalnych --}}
    <div class="local-ads">
        {{-- Tutaj umieść ogłoszenia lokalne --}}
        <h2>Ogłoszenia lokalne</h2>
        <div class="ads-grid">
            {{-- Przykładowe ogłoszenia --}}
            <div class="ad">Ogłoszenie lokalne 1</div>
            <div class="ad">Ogłoszenie lokalne 2</div>
            <div class="ad">Ogłoszenie lokalne 3</div>
            <div class="ad">Ogłoszenie lokalne 4</div>
            <div class="ad">Ogłoszenie lokalne 5</div>
            <div class="ad">Ogłoszenie lokalne 6</div>
        </div>
    </div>
</div>

@include('layouts.footer')

<style>
    /* Style CSS dla całej strony */
    .categories ul {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around; /* Dopasowuje elementy do szerokości ekranu */
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .categories ul li {
        width: calc(25% - 20px); /* Szerokość każdego elementu */
        margin: 10px;
        text-align: center; /* Wyśrodkowanie tekstu */
        background-color: #f0f0f0; /* Kolor tła */
        padding: 10px;
        border-radius: 5px;
    }

    @media screen and (max-width: 768px) {
        .categories ul li {
            width: calc(50% - 20px); /* Na mniejszych ekranach zmniejsza się szerokość */
        }
    }

    @media screen and (max-width: 480px) {
        .categories ul li {
            width: calc(100% - 20px); /* Na bardzo małych ekranach pełna szerokość */
        }
    }

    .promoted-ads,
    .local-ads {
        margin-top: 20px; /* Odstęp między sekcjami */
    }

    .ads-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* 200px szerokości, dostosowanie do szerokości ekranu */
        grid-gap: 20px; /* Odstęp między ogłoszeniami */
    }

    .ad {
        background-color: #f0f0f0;
        padding: 10px;
        border-radius: 5px;
    }
</style>
