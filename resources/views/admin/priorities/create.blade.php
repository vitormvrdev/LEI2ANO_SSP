@extends('layouts.app')

@section('content')
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
                <!-- Glow effect -->
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl blur opacity-25"></div>
                
                <div class="relative bg-white/5 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/10 overflow-hidden">
                    <!-- Form Header -->
                    <div class="relative bg-gradient-to-r from-purple-600/80 to-pink-600/80 backdrop-blur-sm px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-white">Informações da Categoria</h2>
                            </div>
                            <div class="hidden sm:flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <span class="text-sm text-white/80">Online</span>
                            </div>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="p-8 md:p-12">
                        <form action="{{ route('admin.priorities.store') }}" method="POST" class="space-y-8">
                            @csrf

                            <!-- Nome da Categoria -->
                            <div class="group">
                                <label for="name" class="block text-lg font-semibold text-white mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        Nome da Categoria
                                        <span class="text-red-400 ml-1">*</span>
                                    </span>
                                </label>
                                <div class="relative">
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name" 
                                        value="{{ old('name') }}"
                                        class="w-full px-6 py-4 bg-white/5 border-2 border-white/10 rounded-2xl text-white text-lg placeholder-white/50 focus:outline-none focus:border-purple-400 focus:bg-white/10 transition-all duration-300 group-hover:border-white/20 @error('name') border-red-400 @enderror" 
                                        placeholder="Ex: Tecnologia, Lifestyle, Negócios..."
                                        required
                                    >
                                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-purple-500/20 to-pink-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                                </div>
                                @error('name')
                                    <div class="mt-3 flex items-center text-red-400">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Status da Categoria -->
                            <div class="group">
                                <label for="status" class="block text-lg font-semibold text-white mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Status da Categoria
                                    </span>
                                </label>
                                <div class="relative">
                                    <select 
                                        id="status" 
                                        name="status" 
                                        class="w-full px-6 py-4 bg-white/5 border-2 border-white/10 rounded-2xl text-white text-lg focus:outline-none focus:border-purple-400 focus:bg-white/10 transition-all duration-300 appearance-none group-hover:border-white/20 @error('status') border-red-400 @enderror"
                                    >
                                        <option value="ativo" {{ old('status') == 'ativo' ? 'selected' : '' }} class="bg-slate-800 text-white">
                                            🟢 Ativo - Visível publicamente
                                        </option>
                                        <option value="inativo" {{ old('status') == 'inativo' ? 'selected' : '' }} class="bg-slate-800 text-white">
                                            🔴 Inativo - Oculto do público
                                        </option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-6 flex items-center pointer-events-none">
                                        <svg class="h-6 w-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-green-500/20 to-blue-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                                </div>
                                @error('status')
                                    <div class="mt-3 flex items-center text-red-400">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Descrição -->
                            <div class="group">
                                <label for="description" class="block text-lg font-semibold text-white mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                        </svg>
                                        Descrição
                                        <span class="text-white/60 text-sm ml-2 font-normal">(opcional)</span>
                                    </span>
                                </label>
                                <div class="relative">
                                    <textarea 
                                        id="description" 
                                        name="description" 
                                        rows="4"
                                        class="w-full px-6 py-4 bg-white/5 border-2 border-white/10 rounded-2xl text-white text-lg placeholder-white/50 focus:outline-none focus:border-purple-400 focus:bg-white/10 transition-all duration-300 resize-none group-hover:border-white/20"
                                        placeholder="Descreva o propósito e conteúdo desta categoria..."
                                    >{{ old('description') }}</textarea>
                                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/20 to-purple-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-6 pt-8">
                                <a href="{{ route('priorities.index') }}" 
                                   class="group relative flex-1 inline-flex items-center justify-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-bold text-lg rounded-2xl transition-all duration-300 transform hover:scale-105 border border-white/20 hover:border-white/40">
                                    <svg class="w-5 h-5 mr-3 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    Cancelar
                                </a>
                                
                                <button type="submit" 
                                        class="group relative flex-1 inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white font-bold text-lg rounded-2xl transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-green-500/25">
                                    <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-emerald-400 rounded-2xl blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                                    <svg class="relative w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="relative">Criar Categoria</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tips Section -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-blue-500/10 backdrop-blur-sm border border-blue-500/20 rounded-2xl p-6 hover:bg-blue-500/20 transition-all duration-300">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-blue-500/20 rounded-xl flex items-center justify-center">
                                <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-blue-300 mb-2">Dica de Nomenclatura</h3>
                            <p class="text-blue-200 text-sm leading-relaxed">
                                Use nomes claros e descritivos. Evite abreviações e mantenha consistência com outras categorias.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-500/10 backdrop-blur-sm border border-purple-500/20 rounded-2xl p-6 hover:bg-purple-500/20 transition-all duration-300">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-purple-500/20 rounded-xl flex items-center justify-center">
                                <svg class="h-6 w-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-purple-300 mb-2">Gestão de Status</h3>
                            <p class="text-purple-200 text-sm leading-relaxed">
                                Categorias ativas aparecem no site público. Use "Inativo" para preparar categorias antes de publicar.
                            </p>
                        </div>
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

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}
</style>
@endsection