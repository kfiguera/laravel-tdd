<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Repositorios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Enlace</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($repositories as $repository)
                        <tr>
                            <td>{{ $repository->id }}</td>
                            <td>{{ $repository->url }}</td><td></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No hay repositorios Creados</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
