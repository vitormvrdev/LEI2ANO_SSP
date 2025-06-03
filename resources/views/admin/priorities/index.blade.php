<!DOCTYPE html>
<html lang="pt">
<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Priorities</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Ticket Priorities</h1>
        <a href="{{ route('admin.priorities.create') }}" 
           class="bg-green-600 hover:bg-green-500 text-white font-semibold py-2 px-4 rounded-lg transition">
            + New Priority
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
                @foreach ($priorities as $priority)
                    <tr class="bg-gray-700 hover:bg-gray-600 transition">
                        <td class="py-2 px-4 border-b border-gray-600">{{ $priority->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">{{ $priority->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-600 capitalize">{{ $priority->status }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">{{ $priority->created_at->format('d/m/Y H:i') }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">{{ $priority->updated_at->format('d/m/Y H:i') }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.priorities.edit', $priority->id) }}"
                                   class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded text-sm">
                                    Editar
                                </a>
                                <form action="{{ route('admin.priorities.destroy', $priority->id) }}" method="POST" 
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
