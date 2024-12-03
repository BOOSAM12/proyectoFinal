<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tareas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">
    <x-app-layout>
        <div class="max-w-4xl mx-auto py-12">
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold mb-4">Agregar Tarea</h1>

                <form action="{{ route('crearTask') }}" method="POST" class="space-y-4">
                    <!-- Título de la Tarea -->
                    @csrf
                    <div>
                        <label for="titulo" class="block text-sm font-medium">Título de la Tarea:</label>
                        <input type="text" id="titulo" name="title" placeholder="Ingrese el título de la tarea" 
                            class="w-full mt-1 p-2 bg-gray-700 rounded focus:ring focus:ring-indigo-500 text-black">
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="descripcion" class="block text-sm font-medium">Descripción:</label>
                        <textarea id="descripcion" name="description" placeholder="Ingrese la descripción"
                            class="w-full mt-1 p-2 bg-gray-700 rounded focus:ring focus:ring-indigo-500" rows="4"></textarea>
                    </div>

                    <!-- Completado -->
                    <div>
                        <span class="block text-sm font-medium mb-1">¿Completado?</span>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="completed" value="1"  id="completado"
                                    class="text-indigo-500 bg-gray-700 border-gray-600 rounded focus:ring-indigo-500">
                                <span>Sí</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="completed" value="0" id="completado"
                                    class="text-indigo-500 bg-gray-700 border-gray-600 rounded focus:ring-indigo-500" required>
                                <span>No</span>
                            </label>
                        </div>
                    </div>

                    <!-- Categorías -->
                    <div>
                        <label for="categoria" class="block text-sm font-medium">Categoría:</label>
                        <select id="categoria" name="id_categories"
                            class="w-full mt-1 p-2 bg-gray-700 rounded focus:ring focus:ring-indigo-500" required>
                            <option value="" disabled selected>Seleccione una categoría</option>
                            @foreach($categorys as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Botón -->
                    <div>
                        <button type="submit" 
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded shadow">
                            Agregar Tarea
                        </button>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>
            <div class="max-w-4xl mx-auto mt-8 bg-gray-800 rounded-lg shadow-md">
                <h2 class="text-xl font-bold p-4">Lista de tareas</h2>
    
                <!-- Tabla -->
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="p-3 border-b border-gray-600">ID</th>
                            <th class="p-3 border-b border-gray-600">Nombre</th>
                            <th class="p-3 border-b border-gray-600">Descripcion</th>
                            <th class="p-3 border-b border-gray-600">Estado</th>
                            <th class="p-3 border-b border-gray-600">Fecha de Creación</th>
                            <th class="p-3 border-b border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo de Fila -->
                        @foreach ($tasks as $task)
                        <tr class="hover:bg-gray-700">
                            <td class="p-3 border-b border-gray-700">{{$task->id}}</td>
                            <td class="p-3 border-b border-gray-700">{{$task->title}}</td>
                            <td class="p-3 border-b border-gray-700">{{$task->description}}</td>
                            <td class="p-3 border-b border-gray-700">{{$task->completed ? "Completado" : "No completado"}}</td>
                            <td class="p-3 border-b border-gray-700">{{$task->created_at->format('Y-m-d H:i:s')}}</td>
                            <td class="p-3 border-b border-gray-700">
                                <div class="flex space-x-2">
                                    <a href="{{ route('editarTaskView', $task->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-black py-1 px-3 rounded shadow">
                                        Editar
                                    </a>
                                    <a href="{{ route('eliminarTask', $task->id) }}" class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded shadow">
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
        </div>
    </x-app-layout>
</body>
</html>
