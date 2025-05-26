@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('ticket.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-medium mb-2">Título</label>
        <input type="text" id="title" name="title" class="w-full border-gray-300 rounded-lg shadow-sm" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-medium mb-2">Descrição</label>
        <textarea id="description" name="description" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm" required></textarea>
    </div>

    <div class="mb-4">
        <label for="priority_id" class="block text-gray-700 font-medium mb-2">Prioridade</label>
        <select id="priority_id" name="priority_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @foreach($priorities as $priority)
                <option value="{{ $priority->id }}">{{ $priority->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="category_id" class="block text-gray-700 font-medium mb-2">Categoria</label>
        <select id="category_id" name="category_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="level_id" class="block text-gray-700 font-medium mb-2">Nível</label>
        <select id="level_id" name="level_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
            @foreach($levels as $level)
                <option value="{{ $level->id }}">{{ $level->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 px-4 py-2 rounded-lg shadow hover:bg-blue-600 text-white">
            Criar Ticket
        </button>
    </div>
</form>
