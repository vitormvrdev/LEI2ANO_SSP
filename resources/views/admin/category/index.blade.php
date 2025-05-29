<!DOCTYPE html>
<html lang="pt">
<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias de Tickets</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Categorias de Tickets</h1>
        <a href="{{ route('categories.create') }}" 
           class="bg-green-600 hover:bg-green-500 text-white font-semibold py-2 px-4 rounded-lg transition">
            + Nova Categoria
        </a>
    </div>

    <!-- Tabela de Categorias -->
    <div class="overflow-x-auto bg-gray-800 p-4 rounded-xl shadow-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="text-gray-400 text-sm uppercase tracking-wider">
                    <th class="py-2 px-4 border-b border-gray-700 text-left">ID</th>
                    <th class="py-2 px-4 border-b border-gray-700 text-left">Nome</th>
                    <th class="py-2 px-4 border-b border-gray-700 text-left">Status</th>
                    <th class="py-2 px-4 border-b border-gray-700 text-left">Criado em</th>
                    <th class="py-2 px-4 border-b border-gray-700 text-left">Atualizado em</th>
                    <th class="py-2 px-4 border-b border-gray-700 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-gray-700 hover:bg-gray-600 transition">
                        <td class="py-2 px-4 border-b border-gray-600">{{ $category->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">{{ $category->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-600 capitalize">{{ $category->status }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">{{ $category->created_at->format('d/m/Y H:i') }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">{{ $category->updated_at->format('d/m/Y H:i') }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">
                            <div class="flex space-x-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded text-sm">
                                    Editar
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" 
                                      onsubmit="return confirm('Tens a certeza que queres eliminar esta categoria?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded text-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
