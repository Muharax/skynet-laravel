@include('layouts.header')
@include('topbar')
@include('shop.categories-modal')

<button class="ow2" id="toggle-category-modal">Pokaż kategorie</button>
<hr>

<div class="container">
    <div class="hs__wrapper">
        <div class="hs__header">
            <h2 class="hs__headline">Ogłoszenia promowane</h2>
            <div class="hs__arrows">
                <a class="arrow disabled arrow-prev"></a>
                <a class="arrow arrow-next"></a>
            </div>
        </div>
        <ul class="hs">
            @foreach ($promotedAds as $ad)
                <li class="hs__item card">
                    <div class="hs__item__image__wrapper">
                        @if ($ad->image !== null)
                            <img class="hs__item__image" src="{{ asset('shop/images/' . $ad->image) }}"
                                alt="{{ $ad->title }} image">
                        @else
                            <img class="hs__item__image" src="{{ asset('shop/default.svg') }}" alt="Default image">
                        @endif

                    </div>
                    <div class="hs__item__description">
                        <span class="hs__item__title">{{ $ad->title }}</span>
                        <span class="hs__item__subtitle">{{ $ad->description }}</span>
                        <span class="hs__item__subtitle">Cena: {{ $ad->price }} zł</span>
                        <button class="btn">Zobacz</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>



@include('layouts.footer')


<style>
    .card {
        width: 140px;
    }

    .btn {
        background-color: #aaa;
        padding: 4px;
    }

    .btn:hover {
        background-color: #656565;
    }

    ::-webkit-scrollbar {
        width: 0;
        height: 0;
    }

    .hs {
        display: flex;
        overflow-x: scroll;
        justify-content: space-between;
        scrollbar-width: none;
        -ms-overflow-style: none;
        -webkit-overflow-scrolling: touch;
        margin: 0 -20px;
    }

    .hs__header {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .hs__headline {
        flex: 1;
    }

    .hs__arrows {
        align-self: center;
    }

    .hs__arrows .arrow {
        cursor: pointer;
    }

    .hs__arrows .arrow:before {
        content: '';
        display: inline-block;
        vertical-align: middle;
        content: "";
        background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSI5IiB2aWV3Qm94PSIwIDAgMTUgOSI+Cgk8cGF0aCBmaWxsPSIjMzMzMzMzIiBkPSJNNy44NjcgOC41NzRsLTcuMjItNy4yMi43MDctLjcwOEw3Ljg2NyA3LjE2IDE0LjA1Ljk4bC43MDYuNzA3Ii8+Cjwvc3ZnPgo=");
        background-size: contain;
        filter: brightness(5);
        width: 18px;
        height: 12px;
    }

    .hs__arrows .arrow.disabled:before {
        filter: brightness(2);
    }

    .hs__arrows .arrow-prev:before {
        transform: rotate(90deg);
        margin-right: 10px;
    }

    .hs__arrows .arrow-next:before {
        transform: rotate(-90deg);
    }

    .hs__item {
        flex-shrink: 0;
        margin: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        position: relative;
        user-select: none;
    }

    .hs__item:last-child:after {
        content: "";
        display: block;
        position: absolute;
        width: 10px;
        height: 1px;
        right: -20px;
    }

    .hs__item:first-child {
        margin-left: 20px;
    }

    .hs__item__description {
        z-index: 1;
        align-self: flex-start;
        margin: 10px 0;
    }

    .hs__item__description>span {
        color: var(--text-color);
    }

    .hs__item__subtitle {
        color: #aaa;
        display: block;
    }

    .hs__item__image__wrapper {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 100%;
    }

    .hs__item__image {
        pointer-events: none;
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hs__wrapper {
        @media only screen and (min-width: 990px) {
            overflow: hidden;
        }
    }

    @media (hover: none) and (pointer: coarse) {
        .hs__arrows {
            display: none;
        }
    }


    .container {
        max-width: 990px;
        padding: 20px;
        margin: 0 auto;
        background: var(--background-color);
        mix-blend-mode: invert;
        position: relative;
        border: 1px solid red;
    }

    .container:after {
        content: '';
        width: 100vw;
        height: 100%;
        background: var(--background-color);
        position: absolute;
        left: 50%;
        top: 0;
        transform: translateX(-50%);
        z-index: -1;
    }

    ul {
        padding: 0;
        margin: 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const instances = document.querySelectorAll(".hs__wrapper");

        instances.forEach(function(instance) {
            const arrows = instance.querySelectorAll(".arrow");
            const prevArrow = instance.querySelector('.arrow-prev');
            const nextArrow = instance.querySelector('.arrow-next');
            const box = instance.querySelector(".hs");
            let x = 0;
            let mx = 0;
            const maxScrollWidth = box.scrollWidth - (box.clientWidth / 2) - (box.offsetWidth / 2);
            let scrollDirection = 1; // Początkowy kierunek przewijania (w prawo)
            let isScrolling = false;

            // Funkcja inicjująca przewijanie za pomocą requestAnimationFrame
            function startScrolling(direction) {
                isScrolling = true;
                scrollDirection = direction;

                function animate() {
                    if (!isScrolling) return;

                    box.scrollLeft += scrollDirection;

                    // Sprawdź, czy osiągnięto koniec obszaru przewijania
                    if (box.scrollLeft >= maxScrollWidth || box.scrollLeft <= 0) {
                        scrollDirection *= -1; // Zmień kierunek przewijania na przeciwny
                    }

                    requestAnimationFrame(animate);
                }

                animate();
            }

            // Uruchom automatyczne przewijanie po załadowaniu strony
            startScrolling(scrollDirection);

            // Zatrzymaj przewijanie po najechaniu myszą na kontener
            instance.addEventListener('mouseenter', function() {
                isScrolling = false;
            });

            // Wznów przewijanie w tym samym kierunku po opuszczeniu kontenera myszą
            instance.addEventListener('mouseleave', function() {
                startScrolling(scrollDirection);
            });

            arrows.forEach(function(arrow) {
                arrow.addEventListener('click', function() {
                    if (this.classList.contains("arrow-next")) {
                        x = ((box.offsetWidth / 2)) + box.scrollLeft - 10;
                        box.scrollTo({
                            left: x,
                            behavior: 'smooth'
                        });
                    } else {
                        x = ((box.offsetWidth / 2)) - box.scrollLeft - 10;
                        box.scrollTo({
                            left: -x,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            box.addEventListener('mousemove', function(e) {
                const mx2 = e.pageX - this.offsetLeft;
                if (mx) this.scrollLeft = this.sx + mx - mx2;
            });

            box.addEventListener('mousedown', function(e) {
                this.sx = this.scrollLeft;
                mx = e.pageX - this.offsetLeft;
            });

            box.addEventListener('scroll', toggleArrows);

            document.addEventListener("mouseup", function() {
                mx = 0;
            });

            function toggleArrows() {
                if (box.scrollLeft >= maxScrollWidth - 10) {
                    nextArrow.classList.add('disabled');
                    prevArrow.classList.remove('disabled');
                } else if (box.scrollLeft <= 5) {
                    prevArrow.classList.add('disabled');
                    nextArrow.classList.remove('disabled');
                } else if (box.scrollLeft < maxScrollWidth - 10 && box.scrollLeft > 0) {
                    prevArrow.classList.remove('disabled');
                    nextArrow.classList.remove('disabled');
                }
            }
        });
    });









    // Funkcja do przełączania widoczności modala
    function toggleModal() {
        var modal = document.getElementById('category-modal');
        var hideButton = document.getElementById('hide-category-modal');
        var modalBackground = document.getElementById('modal-background');

        if (modal.style.display === 'none' || modal.style.display === '') {
            modal.style.display = 'block';
            modalBackground.style.display = 'block';
        } else {
            modal.style.display = 'none';
            modalBackground.style.display = 'none';
        }

        if (modal.style.display === 'block') {
            modal.style.animation = 'slideDown 0.3s ease';
        }
    }

    // Funkcja do zamykania modala po kliknięciu poza jego obszarem
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('category-modal');
        var toggleButton = document.getElementById('toggle-category-modal');
        var modalBackground = document.getElementById('modal-background');

        if (event.target !== modal && event.target !== toggleButton) {
            modal.style.display = 'none';
            toggleButton.style.display = 'block';
            modalBackground.style.display = 'none';
        }
    });

    // Dodaj obsługę kliknięcia przycisku
    const toggleButton = document.getElementById('toggle-category-modal');
    if (toggleButton) {
        toggleButton.addEventListener('click', toggleModal);
    }
</script>
