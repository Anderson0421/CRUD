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
                <input type="text" name="categoria" id="categoria" value="{{ $lugar->categoria }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="oferta" class="block text-sm font-medium text-gray-600">Oferta</label>
                <input type="text" name="oferta" id="oferta" value="{{ $lugar->oferta }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="imagen_actual" class="block text-sm font-medium text-gray-600">Imagen Actual</label>
                <img class="mt-2 w-28" width="150px" src="{{ asset('storage/' . $lugar->imagen) }}" alt="Imagen actual">
            </div>
            
            <div class="mb-4">
                <label for="nueva_imagen" class="block text-sm font-medium text-gray-600">Nueva Imagen (opcional)</label>
                <input type="file" name="nueva_imagen" id="nueva_imagen" class="mt-1 p-2 border rounded-md w-full">
            </div>
            

            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Guardar Cambios</button>
            </div>
        </form>
    </div>