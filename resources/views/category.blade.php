<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">


    <x-app-layout class="py-8">
        <main class="mt-20">
            <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Agregar Nueva Categoría</h2>
                
                <!-- Formulario -->
                <form class="space-y-4" action="{{ route('crearCategory') }}" method="post">
                    @csrf
                    <div>
                        <label for="nombre" class="block text-sm font-medium">Nombre:</label>
                        <input type="text" id="nombre" name="name" placeholder="Nombre de la categoría" 
                            class="w-full mt-1 p-2 bg-gray-700 rounded focus:ring focus:ring-indigo-500 text-black">
                    </div>
                    
                    <input type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded shadow" value="Registrar Categoria">

                </form>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif  

            </div>
    
            <div class="max-w-4xl mx-auto mt-8 bg-gray-800 rounded-lg shadow-md">
                <h2 class="text-xl font-bold p-4">Lista de Categorías</h2>
    
                <!-- Tabla -->
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="p-3 border-b border-gray-600">ID</th>
                            <th class="p-3 border-b border-gray-600">Nombre</th>
                            <th class="p-3 border-b border-gray-600">Fecha de Creación</th>
                            <th class="p-3 border-b border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo de Fila -->
                        @foreach ($categorys as $category)
                        <tr class="hover:bg-gray-700">
                            <td class="p-3 border-b border-gray-700">{{$category->id}}</td>
                            <td class="p-3 border-b border-gray-700">{{$category->name}}</td>
                            <td class="p-3 border-b border-gray-700">{{$category->created_at->format('Y-m-d H:i:s')}}</td>
                            <td class="p-3 border-b border-gray-700">
                                <div class="flex space-x-2">
                                    <a href="{{ route('editarCategoryView', $category->id )}}" class="bg-yellow-500 hover:bg-yellow-600 text-black py-1 px-3 rounded shadow">
                                        Editar
                                    </a>
                                    <a href="{{ route('eliminarCategory', $category->id )}}" class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded shadow">
                                        Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Más filas pueden ir aquí -->
                    </tbody>
                </table>
            </div>
    
        </main>
    </x-app-layout>
</body>
</html>
