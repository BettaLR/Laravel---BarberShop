<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-barber-gold leading-tight">
            {{ __('Crear Servicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm bg-barber-gray sm:rounded-lg">
                <div class="p-6 text-white">
                    <form method="POST" action="{{ route('admin.services.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Nombre')" class="text-white" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Precio')" class="text-white" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price"
                                :value="old('price')" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Duration -->
                        <div class="mt-4">
                            <x-input-label for="duration" :value="__('Duración (minutos)')" class="text-white" />
                            <x-text-input id="duration" class="block mt-1 w-full" type="number" name="duration"
                                :value="old('duration')" required />
                            <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                        </div>

                        <!-- Active Status -->
                        <div class="block mt-4">
                            <label for="is_active" class="inline-flex items-center">
                                <input id="is_active" type="checkbox"
                                    class="rounded border-gray-300 text-barber-gold shadow-sm focus:ring-barber-gold"
                                    name="is_active" value="1" checked>
                                <span class="ml-2 text-sm text-gray-300">{{ __('Activo') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button
                                class="ml-4 bg-barber-gold text-barber-black hover:bg-white hover:text-barber-black">
                                {{ __('Crear Servicio') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>