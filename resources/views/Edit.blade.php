<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City Tours</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('partials.nav')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4">Editar Lugar</h2>

        <form action="{{ route('update', $lugar->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ $lugar->nombre }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="categoria" class="block text-sm font-medium text-gray-600">Categoría</label>
                <select name="categoria" id="countries_disabled" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="{{$lugar->categoria}}">{{$lugar->categoria}}</option>
                        <option value="Basico">Basico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                </select>
            </div>



            <div class="mb-4">
                <label for="imagen_actual" class="block text-sm font-medium text-gray-600">Imagen Actual</label>
                    <img src="{{ asset('storage/lugares/' . $lugar->imagen) }}" alt="{{ $lugar->nombre }}" class="mt-2 w-28">
            </div>
            
            <div class="mb-4">
                <label for="imagen" class="block text-sm font-medium text-gray-600">Nueva Imagen (opcional)</label>
                <input type="file" name="imagen" id="imagen" class="mt-1 p-2 border rounded-md w-full">
            </div>
            

            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Guardar Cambios</button>
            </div>
        </form>
    </div>