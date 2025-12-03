<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-barber-gold leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm bg-barber-gray sm:rounded-lg">
                <div class="p-6 text-white">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Nombre')" class="text-white" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $user->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-white" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $user->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Role -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Rol')" class="text-white" />
                            <select id="role" name="role"
                                class="block mt-1 w-full border-gray-300 focus:border-barber-gold focus:ring-barber-gold rounded-md shadow-sm text-gray-900">
                                <option value="client" {{ $user->role === 'client' ? 'selected' : '' }}>Cliente</option>
                                <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Personal</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <!-- Active Status -->
                        <div class="block mt-4">
                            <label for="is_active" class="inline-flex items-center">
                                <input id="is_active" type="checkbox"
                                    class="rounded border-gray-300 text-barber-gold shadow-sm focus:ring-barber-gold"
                                    name="is_active" value="1" {{ $user->is_active ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-300">{{ __('Activo') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button
                                class="ml-4 bg-barber-gold text-barber-black hover:bg-white hover:text-barber-black">
                                {{ __('Actualizar Usuario') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>