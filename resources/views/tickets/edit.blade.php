<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0">
        <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="relative inline-block">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full blur-lg opacity-75 animate-pulse"></div>
                    <div class="relative w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-2xl">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent mb-4">
                    Criar Novo Ticket
                </h1>
                <p class="text-xl text-purple-200 max-w-2xl mx-auto leading-relaxed">
                    Preencha os dados abaixo para abrir um ticket de suporte
                </p>
            </div>

            <!-- Form Container -->
            <div class="relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl blur opacity-25"></div>
                <div class="relative bg-white/5 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/10 overflow-hidden">
                    <!-- Form Header -->
                    <div class="relative bg-gradient-to-r from-purple-600/80 to-pink-600/80 backdrop-blur-sm px-8 py-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-white">Informações do Ticket</h2>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="p-8">
                        <!-- Mensagem de Sucesso -->
                        <div id="success-alert" class="hidden mb-6 bg-green-500/10 backdrop-blur-sm border border-green-500/20 rounded-2xl p-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-500/20 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <p class="text-green-300 font-medium">Ticket criado com sucesso! Nossa equipa entrará em contato em breve.</p>
                            </div>
                        </div>

                        <!-- Mensagens de Erro -->
                        <div id="error-alert" class="hidden mb-6 bg-red-500/10 backdrop-blur-sm border border-red-500/20 rounded-2xl p-4">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-red-500/20 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-red-300 font-medium mb-1">Por favor, corrija os seguintes erros:</h3>
                                    <ul id="error-list" class="list-disc pl-5 space-y-1 text-red-300 text-sm"></ul>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('tickets.store')}}" class="space-y-6">
                            @csrf
                            <!-- Título -->
                            <div class="space-y-2">
                                <label for="title" class="block text-sm font-medium text-white">
                                    Título
                                </label>
                                <input 
                                    type="text" 
                                    id="title" 
                                    name="title" 
                                    placeholder="Descreva brevemente o problema"
                                    class="w-full px-6 py-3 bg-white/5 border-2 border-white/10 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-purple-400 focus:bg-white/10 transition-all duration-300"
                                    required
                                >
                            </div>

                            <!-- Descrição -->
                            <div class="space-y-2">
                                <label for="description" class="block text-sm font-medium text-white">
                                    Descrição
                                </label>
                                <textarea 
                                    id="description" 
                                    name="description" 
                                    rows="4"
                                    placeholder="Descreva detalhadamente o problema ou solicitação"
                                    class="w-full px-6 py-3 bg-white/5 border-2 border-white/10 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-purple-400 focus:bg-white/10 transition-all duration-300 resize-none"
                                    required
                                ></textarea>
                            </div>

                            <!-- Grid para os selects -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Prioridade -->
                                <div class="space-y-2">
                                    <label for="priority_id" class="block text-sm font-medium text-white">
                                        Prioridade
                                    </label>
                                    <select 
                                        id="priority_id" 
                                        name="priority_id" 
                                        class="w-full px-4 py-3 bg-white/5 border-2 border-white/10 rounded-xl text-white focus:outline-none focus:border-purple-400 appearance-none"
                                        required
                                    >
                                        <option value="" class="bg-slate-800">Selecione</option>
                                        @foreach($priorities as $priority)
                                            <option value="{{ $priority->id }}" class="bg-slate-800">
                                                {{ $priority->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                
                                <!-- Categoria (com nível incluído) -->
                                <div class="space-y-2">
                                    <label for="category_id" class="block text-sm font-medium text-white">
                                        Categoria
                                    </label>
                                    <select 
                                        id="category_id" 
                                        name="category_id" 
                                        class="w-full px-4 py-3 bg-white/5 border-2 border-white/10 rounded-xl text-white focus:outline-none focus:border-purple-400 appearance-none"
                                        required
                                    >
                                        <option value="" class="bg-slate-800">Selecione uma categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" class="bg-slate-800">
                                                {{ $category->name }}
                                                @if($category->level)
                                                    - Nível {{ $category->level }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Botões de Ação -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-6">
                                <a href="{{ route('tickets.index') }}" 
                                   class="px-6 py-3 bg-white/5 hover:bg-white/10 border border-white/10 text-white rounded-xl transition-all duration-300 text-center">
                                    Cancelar
                                </a>
                                <button 
                                    type="submit" 
                                    class="group relative inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-green-500/25 flex-1"
                                >
                                    <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-emerald-400 rounded-xl blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                                    <svg class="relative w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    <span class="relative">Criar Ticket</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>