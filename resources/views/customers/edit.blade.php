<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>
    <div class="container mx-auto py-6">
        <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="document_number" class="block text-gray-700 text-sm font-bold mb-2">Número de documento:</label>
                <input type="text" name="document_number" id="document_number" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $customer->document_number }}" readonly>
            </div>
            <div class="mb-4">
                <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" name="first_name" id="first_name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $customer->first_name }}">
            </div>
            <div class="mb-4">
                <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                <input type="text" name="last_name" id="last_name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $customer->last_name }}">
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                <input type="text" name="address" id="address" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $customer->address }}">
            </div>
            <div class="mb-4">
                <label for="birthday" class="block text-gray-700 text-sm font-bold mb-2">Fecha de nacimiento:</label>
                <input type="date" name="birthday" id="birthday" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $customer->birthday }}">
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Número de teléfono:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $customer->phone_number }}">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico:</label>
                <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $customer->email }}">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
