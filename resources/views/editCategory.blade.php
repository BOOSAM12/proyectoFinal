<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualziar Categorías</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">


    <x-app-layout class="py-8">
        <main class="mt-20">
            <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Actualziar categoria</h2>
                
                <!-- Formulario -->
                <form class="space-y-4" action="{{ route('editarCategory', $category->id) }}" method="post">
                    @csrf
                    <div>
                        <label for="nombre" class="block text-sm font-medium">Nombre:</label>
                        <input type="text" id="nombre" name="name" placeholder="Nombre de la categoría" value="{{$category->name}}"
                            class="w-full mt-1 p-2 bg-gray-700 rounded focus:ring focus:ring-indigo-500 text-black">
                    </div>
                    
                    <input type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded shadow" value="Actualizar Categoria">

                </form>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif  

            </div>
    
        </main>
    </x-app-layout>
</body>
</html>
