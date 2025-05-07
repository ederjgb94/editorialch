@php($user = auth()->user())
<section>
    <header class="border-b border-gray-200 pb-5">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
            Información Personal
        </h2>
        <p class="mt-1 text-sm leading-6 text-gray-500">
            Actualiza tu información personal y correo electrónico.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6">
        @csrf
        @method('patch')

        <div class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                    Nombre completo
                </label>
                <div class="mt-2">
                    <input type="text" name="name" id="name"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#013243] sm:text-sm sm:leading-6"
                        value="{{ old('name', $user->name) }}"
                        required autofocus autocomplete="name">
                </div>
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                    Correo electrónico
                </label>
                <div class="mt-2">
                    <input type="email" name="email" id="email"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#013243] sm:text-sm sm:leading-6"
                        value="{{ old('email', $user->email) }}"
                        required autocomplete="username">
                </div>
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="link_profile" class="block text-sm font-medium leading-6 text-gray-900">
                    Link Profile (Orcid, LinkedIn, etc.)
                </label>
                <div class="mt-2">
                    <input type="url" name="link_profile" id="link_profile"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#013243] sm:text-sm sm:leading-6"
                        value="{{ old('link_profile', $user->link_profile) }}"
                        autocomplete="url">
                </div>
                @error('link_profile')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6 pt-6 border-t border-gray-200">
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-600 flex items-center">
                    <svg class="w-4 h-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Cambios guardados
                </p>
            @endif

            <button type="submit"
                class="rounded-md bg-[#013243] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#014357] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#013243] flex items-center">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Guardar cambios
            </button>
        </div>
    </form>
</section>
