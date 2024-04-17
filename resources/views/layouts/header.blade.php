<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Skynet</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Funkcja do zapisywania preferencji motywu w localStorage
            function saveThemePreference(theme) {
                localStorage.setItem('theme', theme);
            }

            // Funkcja do wczytywania preferencji motywu z localStorage
            function loadThemePreference() {
                return localStorage.getItem('theme');
            }

            // Funkcja do ustawiania motywu na stronie
            function setTheme(theme) {
                document.documentElement.setAttribute('data-theme', theme);
            }

            // Funkcja do wykrywania preferencji motywu systemu
            function detectSystemTheme() {
                const prefersDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)')
                    .matches;
                return prefersDarkMode ? 'dark' : 'light';
            }

            // Sprawdź preferencje motywu zapisane w localStorage
            const savedTheme = loadThemePreference();
            const initialTheme = savedTheme || 'auto';

            // Ustaw motyw na stronie zgodnie z preferencjami
            setTheme(initialTheme);

            // Spróbuj wykryć preferencje motywu systemu
            const systemTheme = detectSystemTheme();
            if (initialTheme === 'auto') {
                // Ustaw motyw na stronie zgodnie z preferencjami systemu lub domyślnie na światły
                setTheme(systemTheme);
            }

            // Dodaj transition dla płynnej zmiany motywu do wszystkich elementów
            document.documentElement.style.transition =
            'background-color 0.3s ease'; // Możesz zmienić 'background-color' na inne właściwości, które chcesz animować

            // Obsługa zmiany wyboru w select
            const themeSelect = document.getElementById('theme-select');
            if (themeSelect) {
                // Ustaw wybrany motyw w select na podstawie wartości zapisanej w localStorage lub wykrytej preferencji systemu
                if (savedTheme) {
                    themeSelect.value = savedTheme;
                } else if (initialTheme === 'auto') {
                    themeSelect.selectedIndex = 0; // Ustaw wybraną opcję na "auto"
                } else {
                    themeSelect.value = initialTheme;
                }

                themeSelect.addEventListener('change', function() {
                    const selectedTheme = themeSelect.value;
                    setTheme(selectedTheme);

                    // Jeśli wybrano opcję "auto", usuń wartość motywu z localStorage i użyj preferencji systemu
                    if (selectedTheme === 'auto') {
                        localStorage.removeItem('theme');
                        const systemTheme = detectSystemTheme();
                        setTheme(systemTheme);
                    } else {
                        // Zapisz preferencje motywu w localStorage
                        saveThemePreference(selectedTheme);
                    }
                });
            }
        });
    </script>


</head>

<body class="font-sans antialiased">
