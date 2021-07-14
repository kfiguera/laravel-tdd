<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Repositorios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form action="{{ route('repositories.create') }}" method="post" class="sm:max-w-md">
                    @csrf
                    @method('POST')
                    <label for="" class="block font-medium text-sm text-gray-700">URL *</label>
                    <input type="text" name="url" class="form-input w-full rounded-md shadow-sm"
                           value="{{ old('url') }}">

                    <label for="" class="block font-medium text-sm text-gray-700">Descripcion *</label>
                    <textarea type="text" name="description"
                              class="form-input w-full rounded-md shadow-sm">{{ old('description') }}</textarea>
                    <hr class="my-4">
                    <input type="submit" value="Guardar" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>