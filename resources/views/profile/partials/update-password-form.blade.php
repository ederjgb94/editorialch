@php($user = auth()->user())
<section>
    <header class="border-b border-gray-200 pb-5">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
            Cambiar Contraseña
        </h2>
        <p class="mt-1 text-sm leading-6 text-gray-500">
            Asegúrate de usar una contraseña segura para proteger tu cuenta.
        </p>
    </header>

    <form method="post" action="{{ route('profile.password.update') }}" class="mt-6">
        @csrf
        @method('put')

        <div class="space-y-6">
            <div>
                <label for="current_password" class="block text-sm font-medium leading-6 text-gray-900">
                    Contraseña actual
                </label>
                <div class="mt-2">
                    <input type="password" name="current_password" id="current_password"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#013243] sm:text-sm sm:leading-6"
                        autocomplete="current-password">
                </div>
                @error('current_password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                    Nueva contraseña
                </label>
                <div class="mt-2">
                    <input type="password" name="password" id="password"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#013243] sm:text-sm sm:leading-6"
                        autocomplete="new-password">
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">
                    Confirmar nueva contraseña
                </label>
                <div class="mt-2">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#013243] sm:text-sm sm:leading-6"
                        autocomplete="new-password">
                </div>
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6 pt-6 border-t border-gray-200">
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-600 flex items-center">
                    <svg class="w-4 h-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Contraseña actualizada
                </p>
            @endif

            <button type="submit"
                class="rounded-md bg-[#013243] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#014357] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#013243] flex items-center">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                </svg>
                Actualizar contraseña
            </button>
        </div>
    </form>
</section>
