<x-guest-layout>
    <div class="w-full max-w-md px-8 py-10 bg-white border border-gray-300 rounded-xl shadow-sm">

        {{-- LOGO: aquí puedes poner tu imagen --}}
        <div class="flex flex-col items-center mb-6">
            {{-- Si tienes un logo en public/img/logo-evoni.png, por ejemplo: --}}
            {{-- <img src="{{ asset('img/logo-evoni.png') }}" alt="EVONI" class="w-16 h-auto mb-3"> --}}
            <h1 class="text-3xl font-semibold tracking-wide">EVONI</h1>
            <p class="mt-1 text-xs tracking-[0.3em] uppercase text-gray-500">
                ORGANIZACIÓN DE EVENTOS
            </p>
        </div>

        {{-- MENSAJE DE ESTADO (aquí saldrá "Registro exitoso") --}}
        <x-auth-session-status class="mb-4 text-sm text-gray-700" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            {{-- EMAIL --}}
            <div>
                <x-input-label for="email"
                    :value="__('Correo electrónico')"
                    class="text-sm font-medium text-gray-800" />

                <x-text-input
                    id="email"
                    class="block w-full mt-1 border border-gray-400 rounded-md text-sm
                           focus:border-black focus:ring-black"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username" />

                <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
            </div>

            {{-- CONTRASEÑA --}}
            <div>
                <x-input-label for="password"
                    :value="__('Contraseña')"
                    class="text-sm font-medium text-gray-800" />

                <x-text-input
                    id="password"
                    class="block w-full mt-1 border border-gray-400 rounded-md text-sm
                           focus:border-black focus:ring-black"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
            </div>

            {{-- RECORDAR --}}
            <div class="flex items-center justify-between mt-2">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-black shadow-sm focus:ring-black"
                           name="remember">
                    <span class="ml-2 text-xs text-gray-600">
                        {{ __('Recordarme') }}
                    </span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-xs text-gray-500 underline hover:text-black"
                       href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            {{-- BOTÓN INICIAR SESIÓN --}}
            <div class="pt-2">
                <x-primary-button
                    class="w-full justify-center bg-black hover:bg-gray-900
                           focus:ring-black text-sm">
                    {{ __('Iniciar sesión') }}
                </x-primary-button>
            </div>
        </form>

        {{-- ENLACES INFERIORES --}}
        <div class="mt-6 text-xs text-center text-gray-500 space-y-2">
            <div>
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="underline hover:text-black">
                    Crear cuenta
                </a>
            </div>

            <div>
                <a href="{{ route('inicio') }}" class="underline hover:text-black">
                    ← Volver al inicio
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>