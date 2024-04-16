@include('layouts.header')
@include('topbar')

<div class="login-form flex justify-center items-center animation">



    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md" method="POST"
        action="{{ route('login') }}">
        @csrf
        <h2 class="text-center text-2xl font-semibold mb-4">Logowanie</h2>

        <!-- W widoku formularza logowania -->

        @if ($errors->has('loginError'))
            <p class="text-red-500">{{ $errors->first('loginError') }}</p>
        @endif

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">E-mail</label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email" name="email" type="email" placeholder="E-mail" value="xipaja2071@dacgu.com" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="password" name="password" type="password" placeholder="Password" value="hga12345678!@#" required>
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">Logowanie</button>
        </div>
    </form>
</div>

@include('layouts.footer')

<style>
    .animation {
        animation: slide-in 1s ease-in-out;
    }

    @keyframes slide-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>
