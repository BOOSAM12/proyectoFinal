<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Tareas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">
    <x-app-layout>
        <div class="max-w-4xl mx-auto py-12">
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold mb-4">Actualizar Tarea</h1>

                <form action="{{ route('editarTask', $task->id) }}" method="POST" class="space-y-4">
                    <!-- Título de la Tarea -->
                    @csrf
                    <div>
                        <label for="titulo" class="block text-sm font-medium">Título de la Tarea:</label>
                        <input type="text" id="titulo" name="title" placeholder="Ingrese el título de la tarea" value="{{$task->title}}"
                            class="w-full mt-1 p-2 bg-gray-700 rounded focus:ring focus:ring-indigo-500 text-black">
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="descripcion" class="block text-sm font-medium">Descripción:</label>
                        <textarea id="descripcion" name="description" placeholder="Ingrese la descripción" 
                            class="w-full mt-1 p-2 bg-gray-700 rounded focus:ring focus:ring-indigo-500" rows="4">{{$task->description}}</textarea>
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
                            Actualziar tarea
                        </button>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>
            
        </div>
    </x-app-layout>
</body>
</html>
