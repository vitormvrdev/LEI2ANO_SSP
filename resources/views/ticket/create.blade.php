<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Ticket de Suporte</title>
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
        .btn-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }
        .hidden {
            display: none;
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
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <div class="min-h-screen p-4 flex items-center justify-center">
        <div class="w-full max-w-2xl">
            
            <!-- Mensagem de Sucesso -->
            <div id="success-alert" class="hidden mb-6 p-4 bg-green-900/50 border border-green-700/50 rounded-lg shadow-sm backdrop-blur-sm">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-green-300 font-medium">Ticket criado com sucesso! Nossa equipe entrará em contato em breve.</p>
                </div>
            </div>

            <!-- Mensagens de Erro -->
            <div id="error-alert" class="hidden mb-6 p-4 bg-red-900/50 border border-red-700/50 rounded-lg shadow-sm backdrop-blur-sm">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-red-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <ul id="error-list" class="list-disc pl-4 space-y-1 text-red-300 text-sm"></ul>
                    </div>
                </div>
            </div>

            <!-- Formulário -->
            <div class="card-blur rounded-xl shadow-2xl">
                <!-- Header -->
                <div class="text-center p-8 pb-6">
                    <div class="mx-auto w-16 h-16 bg-blue-900/50 rounded-full flex items-center justify-center mb-6 border border-blue-700/30">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-slate-100 mb-2">Criar Novo Ticket</h1>
                    <p class="text-slate-400">Preencha os dados abaixo para abrir um ticket de suporte</p>
                </div>

                <!-- Form Content -->
                <div class="px-8 pb-8">
                    <form id="ticket-form" class="space-y-6">
                        
                        <!-- Título -->
                        <div class="space-y-2">
                            <label for="title" class="block text-sm font-semibold text-slate-300">
                                Título *
                            </label>
                            <input 
                                type="text" 
                                id="title" 
                                name="title" 
                                placeholder="Descreva brevemente o problema"
                                class="w-full h-12 px-4 input-dark rounded-lg shadow-sm transition-all duration-200"
                                required
                            >
                        </div>

                        <!-- Descrição -->
                        <div class="space-y-2">
                            <label for="description" class="block text-sm font-semibold text-slate-300">
                                Descrição *
                            </label>
                            <textarea 
                                id="description" 
                                name="description" 
                                rows="4"
                                placeholder="Descreva detalhadamente o problema ou solicitação"
                                class="w-full px-4 py-3 input-dark rounded-lg shadow-sm transition-all duration-200 resize-none"
                                required
                            ></textarea>
                        </div>

                        <!-- Grid para os selects -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            
                            <!-- Prioridade -->
                            <div class="space-y-2">
                                <label for="priority_id" class="block text-sm font-semibold text-slate-300">
                                    Prioridade *
                                </label>
                                <select 
                                    id="priority_id" 
                                    name="priority_id" 
                                    class="w-full h-12 px-4 input-dark rounded-lg shadow-sm transition-all duration-200"
                                    required
                                >
                                    <option value="" class="bg-slate-800">Selecione</option>
                                    <option value="1" class="bg-slate-800">🟢 Baixa</option>
                                    <option value="2" class="bg-slate-800">🟡 Média</option>
                                    <option value="3" class="bg-slate-800">🟠 Alta</option>
                                    <option value="4" class="bg-slate-800">🔴 Crítica</option>
                                </select>
                            </div>

                            <!-- Categoria -->
                            <div class="space-y-2">
                                <label for="category_id" class="block text-sm font-semibold text-slate-300">
                                    Categoria *
                                </label>
                                <select 
                                    id="category_id" 
                                    name="category_id" 
                                    class="w-full h-12 px-4 input-dark rounded-lg shadow-sm transition-all duration-200"
                                    required
                                >
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" class="bg-slate-800">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>

                            <!-- Nível -->
                            <div class="space-y-2">
                                <label for="level_id" class="block text-sm font-semibold text-slate-300">
                                    Nível *
                                </label>
                                <select 
                                    id="level_id" 
                                    name="level_id" 
                                    class="w-full h-12 px-4 input-dark rounded-lg shadow-sm transition-all duration-200"
                                    required
                                >
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}" class="bg-slate-800">{{ $level->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Botão de Submit -->
                        <div class="pt-4">
                            <button 
                                type="submit" 
                                class="w-full h-12 btn-gradient text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center space-x-2 hover:scale-[1.02]"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                </svg>
                                <span>Criar Ticket</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Informação adicional -->
            <div class="mt-6 text-center">
                <p class="text-sm text-slate-400">
                    Após criar o ticket, você receberá um email de confirmação com o número de protocolo.
                </p>
            </div>

            <!-- Decoração adicional -->
            <div class="absolute top-10 left-10 w-20 h-20 bg-blue-500/10 rounded-full blur-xl"></div>
            <div class="absolute bottom-10 right-10 w-32 h-32 bg-purple-500/10 rounded-full blur-xl"></div>
            <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-cyan-500/10 rounded-full blur-xl"></div>
        </div>
    </div>

    <script>
        document.getElementById('ticket-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Limpar alertas anteriores
            document.getElementById('success-alert').classList.add('hidden');
            document.getElementById('error-alert').classList.add('hidden');
            
            // Validação
            const errors = [];
            const title = document.getElementById('title').value.trim();
            const description = document.getElementById('description').value.trim();
            const priority = document.getElementById('priority_id').value;
            const category = document.getElementById('category_id').value;
            const level = document.getElementById('level_id').value;
            
            if (!title) errors.push('O título é obrigatório');
            if (!description) errors.push('A descrição é obrigatória');
            if (!priority) errors.push('A prioridade é obrigatória');
            if (!category) errors.push('A categoria é obrigatória');
            if (!level) errors.push('O nível é obrigatório');
            
            if (errors.length > 0) {
                // Mostrar erros
                const errorList = document.getElementById('error-list');
                errorList.innerHTML = '';
                errors.forEach(error => {
                    const li = document.createElement('li');
                    li.textContent = error;
                    errorList.appendChild(li);
                });
                document.getElementById('error-alert').classList.remove('hidden');
                
                // Scroll para o topo
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return;
            }
            
            // Simular sucesso
            document.getElementById('success-alert').classList.remove('hidden');
            
            // Limpar formulário
            this.reset();
            
            // Scroll para o topo
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            // Esconder mensagem de sucesso após 5 segundos
            setTimeout(() => {
                document.getElementById('success-alert').classList.add('hidden');
            }, 5000);
        });

        // Adicionar efeito de partículas nos inputs
        document.querySelectorAll('input, textarea, select').forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>