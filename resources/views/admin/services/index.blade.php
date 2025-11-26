<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-barber-gold leading-tight">
                {{ __('Services Management') }}
            </h2>
            <a href="{{ route('admin.services.create') }}"
                class="bg-barber-gold hover:bg-white text-barber-black font-bold py-2 px-4 rounded transition duration-300">
                Create Service
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
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Price</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Duration (min)</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-barber-gold uppercase tracking-wider">
                                    Actions</th>
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
                                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.services.edit', $service) }}"
                                            class="text-barber-gold hover:text-white mr-3 transition duration-300">Edit</a>
                                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-200 transition duration-300"
                                                onclick="return confirm('Are you sure you want to delete this service?')">
                                                Delete
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
</x-app-layout>