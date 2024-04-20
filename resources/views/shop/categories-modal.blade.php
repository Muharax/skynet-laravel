@php
    $categoriesController = app()->make(\App\Http\Controllers\CategoryController::class);
    $categories = $categoriesController->showAllCategories()->getData()['categories'];
@endphp

<div id="category-modal" class="modal"
    style="display: none; position: absolute; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); z-index: 1000;">

    <div style="width: 100%;"> <!-- Dodatkowy styl, aby kategorie miały równą szerokość -->
        @foreach ($categories as $category)
            <div class="category-item">
                <a class="xyz" href="{{ route('announcement.index', ['category' => $category->id]) }}">
                    <div>
                        {{ $category->name }}
                    </div>
                    @if ($category->image)
                        <div>
                            <img src="{{ $category->image_url }}" alt="{{ $category->name }} image">
                        </div>
                    @endif
                </a>
            </div>
        @endforeach
    </div>

    <button id="hide-category-modal">
        Ukryj kategorie
        <span title="Zeby zamknąć kategorie możesz kliknąć poza obszarem okna">
            [ ? ]
        </span>
    </button>
</div>

<div id="modal-background" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999;"></div>

<script></script>

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

    /* Dodatkowy styl CSS */
    .category-item {
        margin-bottom: 10px;
        /* Dodatkowy margines między kategoriami */
        padding: 4px;
        border-radius: 4px;
        transition: 300ms;
    }

    .category-item:hover {
        background-color: rgb(181, 181, 181);
        transform: translateX(10px);
    }

    .category-item img {
        width: 50px;
        /* Dostosuj szerokość obrazu */
        margin-right: 10px;
        /* Dodatkowy margines po prawej stronie obrazu */
        margin-left: 10px;
    }

    .category-item span {
        flex: 1;
        /* Rozciągnij napis, aby zajmował dostępne miejsce */
    }

    .category-item a {
        /*  */
    }

    .xyz {
        display: flex;
        justify-content: space-between;
        align-items: center;
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
