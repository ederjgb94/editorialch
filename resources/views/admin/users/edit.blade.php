@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 border-b border-gray-200 pb-6">
        <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            ← Volver a la Lista de Usuarios
        </a>
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Editar Usuario</h1>
        <p class="text-lg text-gray-600">Modifica los datos del usuario y su rol</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6 p-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                        value="{{ old('name', $user->name) }}">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" id="email" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Rol</label>
                    <select name="role" id="role" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]">
                        <option value="">Selecciona un rol</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->slug }}" 
                                {{ old('role', $user->roles->first()?->slug) == $role->slug ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="link_profile" class="block text-sm font-medium text-gray-700">Link Profile (Orcid, LinkedIn, etc.)</label>
                    <input type="url" name="link_profile" id="link_profile"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                        value="{{ old('link_profile', $user->link_profile) }}">
                    @error('link_profile')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-[#013243] hover:bg-[#013243]/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
                    Actualizar Usuario
                </button>
            </div>
        </form>
    </div>
</div>
@endsection