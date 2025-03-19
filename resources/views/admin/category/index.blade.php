<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias de Tickets</title>
    @vite('resources/css/app.css') <!-- Certifica-te que estás a usar o Vite corretamente -->
</head>
<body class="bg-gray-900 text-white p-6">
    <h1 class="text-2xl mb-6">Categorias de Tickets</h1>
    
    <!-- Tabela de Categorias -->
    <div class="overflow-x-auto bg-gray-800 p-4 rounded-lg shadow-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="text-gray-400">
                    <th class="py-2 px-4 border-b border-gray-700 text-left">ID</th>
                    <th class="py-2 px-4 border-b border-gray-700 text-left">Nome</th>
                    <th class="py-2 px-4 border-b border-gray-700 text-left">Status</th>
                    <th class="py-2 px-4 border-b border-gray-700 text-left">Criado em</th>
                    <th class="py-2 px-4 border-b border-gray-700 text-left">Atualizado em</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-gray-700 hover:bg-gray-600">
                        <td class="py-2 px-4 border-b border-gray-600">{{ $category->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">{{ $category->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">{{ $category->status }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">{{ $category->created_at }}</td>
                        <td class="py-2 px-4 border-b border-gray-600">{{ $category->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
