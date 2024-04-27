<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoría') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Editar Categoría</h1>
        <form action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" value="{{ $categoria->id }}" disabled>
            </div>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{ $categoria->name }}">
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" rows="4">{{ $categoria->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    @include('footer')
</x-app-layout>
