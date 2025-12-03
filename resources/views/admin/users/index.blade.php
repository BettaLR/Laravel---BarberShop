<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-barber-gold leading-tight">
                {{ __('Gestión de Usuarios') }}
            </h2>
            <a href="{{ route('admin.users.create') }}"
                class="bg-barber-gold hover:bg-white text-barber-black font-bold py-2 px-4 rounded transition duration-300">
                Crear Usuario
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
                                    Correo</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Rol</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Estado</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700 bg-barber-gray">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->role === 'admin' ? 'bg-red-900 text-red-200' : ($user->role === 'staff' ? 'bg-blue-900 text-blue-200' : 'bg-gray-700 text-gray-300') }}">
                                            {{ $user->role === 'admin' ? 'Administrador' : ($user->role === 'staff' ? 'Personal' : 'Cliente') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_active ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                            {{ $user->is_active ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="text-barber-gold hover:text-white mr-3 transition duration-300">Editar</a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                            class="inline toggle-status-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-400 hover:text-red-200 transition duration-300">
                                                {{ $user->is_active ? 'Desactivar' : 'Activar' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.toggle-status-form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const button = this.querySelector('button');
                    const action = button.innerText.trim();

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: `¿Quieres ${action.toLowerCase()} este usuario?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, hazlo',
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