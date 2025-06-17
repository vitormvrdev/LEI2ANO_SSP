<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Nova Categoria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 relative overflow-hidden">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent mb-4">
                    Nova Categoria
                </h1>
                <p class="text-xl text-purple-200 max-w-2xl mx-auto leading-relaxed">
                    Crie uma nova categoria para organizar e estruturar o seu conteúdo de forma eficiente
                </p>
            </div>

            <!-- Main Form Container -->
            <div class="relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl blur opacity-25"></div>

                <div class="relative bg-white/5 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/10 overflow-hidden">
                    <div class="relative bg-gradient-to-r from-purple-600/80 to-pink-600/80 backdrop-blur-sm px-8 py-6">
                        <div class="flex items-center justify-between">
                            <h2 class="text-2xl font-bold text-white">Informações da Categoria</h2>
                        </div>
                    </div>

                    <div class="p-8 md:p-12">
                        <form action="{{ route('categories.store') }}" method="POST" class="space-y-8">
                            @csrf

                            <!-- Nome -->
                            <div>
                                <label for="name" class="block text-lg font-semibold text-white mb-2">Nome da Categoria <span class="text-red-400">*</span></label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    class="w-full px-6 py-4 bg-white/5 border-2 border-white/10 rounded-2xl text-white focus:outline-none focus:border-purple-400" 
                                    placeholder="Ex: Tecnologia, Lifestyle..." 
                                    required
                                >
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-lg font-semibold text-white mb-2">Status</label>
                                <select 
                                    id="status" 
                                    name="status" 
                                    class="w-full px-6 py-4 bg-white/5 border-2 border-white/10 rounded-2xl text-white focus:outline-none focus:border-purple-400"
                                >
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }} class="bg-slate-800">🟢 Ativa</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }} class="bg-slate-800">🔴 Inativa</option>
                                </select>
                            </div>

                            <!-- Nível -->
                            <div>
                                <label for="level" class="block text-lg font-semibold text-white mb-2">Nível da Categoria</label>
                                <select 
                                    id="level" 
                                    name="level" 
                                    class="w-full px-6 py-4 bg-white/5 border-2 border-white/10 rounded-2xl text-white focus:outline-none focus:border-purple-400"
                                    required
                                >
                                    <option value="" class="bg-slate-800 text-white">Selecione o nível</option>
                                    <option value="1" {{ old('level') == '1' ? 'selected' : '' }} class="bg-slate-800 text-white">Nível 1</option>
                                    <option value="2" {{ old('level') == '2' ? 'selected' : '' }} class="bg-slate-800 text-white">Nível 2</option>
                                    <option value="3" {{ old('level') == '3' ? 'selected' : '' }} class="bg-slate-800 text-white">Nível 3</option>
                                </select>
                            </div>

                            <!-- Botões -->
                            <div class="flex flex-col sm:flex-row gap-6 pt-8">
                                <a href="{{ route('categories.index') }}" class="flex-1 px-8 py-4 bg-white/10 hover:bg-white/20 text-white text-center font-bold rounded-2xl transition-all duration-300 border border-white/20 hover:border-white/40">
                                    Cancelar
                                </a>
                                <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white font-bold rounded-2xl transition-all duration-300 shadow-2xl hover:shadow-green-500/25">
                                    Criar Categoria
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}
.animate-blob { animation: blob 7s infinite; }
.animation-delay-2000 { animation-delay: 2s; }
.animation-delay-4000 { animation-delay: 4s; }
</style>
</body>
</html>
