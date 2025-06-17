<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        }
        .card-blur {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(71, 85, 105, 0.3);
        }
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }
        .btn-secondary {
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        }
        .btn-secondary:hover {
            background: linear-gradient(135deg, #475569 0%, #334155 100%);
        }
        .input-dark {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(71, 85, 105, 0.5);
            color: #e2e8f0;
        }
        .input-dark:focus {
            background: rgba(30, 41, 59, 0.8);
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .input-dark::placeholder {
            color: #64748b;
        }
        .status-indicator {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 8px;
        }
        .status-ativo {
            background-color: #10b981;
        }
        .status-inativo {
            background-color: #ef4444;
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <div class="min-h-screen p-4 flex items-center justify-center">
        <div class="w-full max-w-2xl">
            
            <!-- Formulário -->
            <div class="card-blur rounded-xl shadow-2xl">
                <!-- Header -->
                <div class="p-8 pb-6 border-b border-slate-700/50">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-amber-900/50 rounded-full flex items-center justify-center border border-amber-700/30">
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-slate-100">Editar Categoria</h1>
                            <p class="text-slate-400 text-sm">Atualize as informações da categoria</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-8">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nome da Categoria -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-semibold text-slate-300">
                            Nome da Categoria *
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name', $category->name) }}"
                                placeholder="Digite o nome da categoria"
                                class="w-full h-12 px-4 pl-12 input-dark rounded-lg shadow-sm transition-all duration-200"
                                required
                            >
                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <label for="status" class="block text-sm font-semibold text-slate-300">
                            Estado *
                        </label>
                        <div class="relative">
                            <select 
                                id="status" 
                                name="status"
                                class="w-full h-12 px-4 pl-12 input-dark rounded-lg shadow-sm transition-all duration-200 appearance-none"
                                required
                            >
                                <option value="" disabled {{ old('status', $category->status) === null ? 'selected' : '' }}>Selecione o estado</option>
                                <option value="active" {{ old('status', $category->status) === 'active' ? 'selected' : '' }}>Ativo</option>
                                <option value="inactive" {{ old('status', $category->status) === 'inactive' ? 'selected' : '' }}>Inativo</option>
                            </select>
                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <a href="{{ route('categories.index') }}"
                            class="flex-1 h-12 btn-secondary text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <span>Cancelar</span>
                        </a>

                        <button 
                            type="submit" 
                            class="flex-1 h-12 btn-primary text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center space-x-2 hover:scale-[1.02]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Guardar Alterações</span>
                        </button>
                    </div>
                </form>
                </div>
            </div>

            <!-- Decoração adicional -->
            <div class="absolute top-10 left-10 w-20 h-20 bg-amber-500/10 rounded-full blur-xl"></div>
            <div class="absolute bottom-10 right-10 w-32 h-32 bg-blue-500/10 rounded-full blur-xl"></div>
        </div>
    </div>
</body>
</html>