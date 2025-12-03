<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-barber-gold leading-tight">
                {{ __('Gestión de Servicios') }}
            </h2>
            <a href="{{ route('admin.services.create') }}"
                class="bg-barber-gold hover:bg-white text-barber-black font-bold py-2 px-4 rounded transition duration-300">
                Crear Servicio
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm bg-barber-gray sm:rounded-lg">
                <div class="p-6 text-white">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-barber-black">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Nombre</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Precio</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Duración (min)</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Estado</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700 bg-barber-gray">
                            @foreach ($services as $service)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $service->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($service->price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $service->duration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $service->is_active ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                            {{ $service->is_active ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.services.edit', $service) }}"
                                            class="text-barber-gold hover:text-white mr-3 transition duration-300">Editar</a>
                                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                            class="inline delete-service-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-200 transition duration-300">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.delete-service-form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminarlo',
                        cancelButtonText: 'Cancelar',
                        background: '#1a1a1a',
                        color: '#ffffff'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>