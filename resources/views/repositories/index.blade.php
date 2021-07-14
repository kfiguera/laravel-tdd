<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Repositorios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-right mb-4 text-sm">
                <a class="px-5 py-2 bg-blue-500 border text-white rounded "
                   href="{{ route('repositories.create') }}"> Agregar Nuevo Repositorio
                </a>
            </p>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="rounded-t-lg w-full mx-auto bg-gray-200 text-gray-800">
                    <thead class="text-left border-b-2 border-gray-300">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Enlace</th>
                        <th class="w-2">&nbsp;</th>
                        <th class="w-2">&nbsp;</th>
                        <th class="w-2">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody class="bg-gray-100 border-b border-gray-200">
                    @forelse($repositories as $repository)
                        <tr class="bg-gray-100 border-b border-gray-200 rounded-lg">
                            <td class="px-4 py-3">{{ $repository->id }}</td>
                            <td class="px-4 py-3">{{ $repository->url }}</td>
                            <td class="px-2 text-right text-sm leading-5">
                                <a class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none"
                                   href="{{ route('repositories.show',compact('repository')) }}"> Ver</a></td>
                            <td class="px-2 text-right text-sm leading-5">
                                <a class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none"
                                   href="{{ route('repositories.edit',compact('repository')) }}"> Editar</a></td>
                            <td class="px-2 text-right text-sm leading-5">
                                <form action="{{ route('repositories.destroy',$repository) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none"
                                        href="{{ route('repositories.edit',compact('repository')) }}"> Eliminar
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td colspan="5" class="px-4 py-3 text-center">No hay repositorios Creados</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
