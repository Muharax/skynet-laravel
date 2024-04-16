@include('layouts.header')
@include('topbar')

<div class="MAIN flex justify-center items-center">
    <div>
        <h2 class="text-2xl font-bold mb-4">Witaj w centrum twojego profilu!</h2>
        <p>Możesz tutaj dostosować ustawienia i sprawdzić swoje dane.</p>

        {{-- Wyświetlenie danych użytkownika --}}
        <p>Imię: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        
        {{-- Przyciski zmiany --}}
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleChange('name')">Zmień nazwę</button>
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleChange('password')">Zmień hasło</button>
        
        {{-- Formularze zmiany --}}
        <div id="changeNameForm" style="display: none;">
            <input type="text" placeholder="Nowe imię">
            <button class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">Zapisz</button>
        </div>
        <div id="changePasswordForm" style="display: none;">
            <input type="password" placeholder="Nowe hasło">
            <input type="password" placeholder="Potwierdź hasło">
            <button class="bg-green-500 text-white font-bold py-2 px-4 rounded mt-2">Zapisz</button>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    function toggleChange(type) {
        var changeNameForm = document.getElementById('changeNameForm');
        var changePasswordForm = document.getElementById('changePasswordForm');
        
        // Schowaj oba formularze
        changeNameForm.style.display = 'none';
        changePasswordForm.style.display = 'none';

        // Pokaż odpowiedni formularz
        if (type === 'name') {
            changeNameForm.style.display = 'block';
        } else if (type === 'password') {
            changePasswordForm.style.display = 'block';
        }
    }
</script>

<style>
    /* Dodaj style według potrzeb */
</style>
