<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Tickets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'blob': 'blob 7s infinite',
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 relative overflow-x-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0">
        <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
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
                    Tickdesk - Gestão de Tickets
                </h1>
            </div>

            <!-- Actions Bar -->
            <div class="mb-8">
                <div class="relative">
                    <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl blur opacity-25"></div>
                    <div class="relative bg-white/5 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/10 p-6">
                        <form method="GET" action="{{ route('tickets.index') }}" class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                            <!-- Search and Filters -->
                            <div class="flex flex-col sm:flex-row gap-4 flex-1">
                                <!-- Search -->
                                <div class="relative flex-1">
                                    <input type="text" 
                                           name="search"
                                           value="{{ request('search') }}"
                                           placeholder="Pesquisar tickets..." 
                                           class="w-full px-6 py-3 bg-white/5 border-2 border-white/10 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-purple-400 focus:bg-white/10 transition-all duration-300">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                        <svg class="h-5 w-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Status Filter -->
                                <select name="status" class="px-4 py-3 bg-white/5 border-2 border-white/10 rounded-xl text-white focus:outline-none focus:border-purple-400 appearance-none min-w-[150px]">
                                    <option value="" class="bg-slate-800">Todos os Status</option>
                                    <option value="open" {{ request('status') == 'open' ? 'selected' : '' }} class="bg-slate-800">🟢 Aberto</option>
                                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }} class="bg-slate-800">🟡 Em Progresso</option>
                                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }} class="bg-slate-800">🔴 Fechado</option>
                                </select>

                                <!-- Priority Filter -->
                                <select name="priority_id" class="px-4 py-3 bg-white/5 border-2 border-white/10 rounded-xl text-white focus:outline-none focus:border-purple-400 appearance-none min-w-[150px]">
                                    <option value="" class="bg-slate-800">Todas Prioridades</option>
                                    @foreach($priorities as $priority)
                                        <option value="{{ $priority->id }}" {{ request('priority_id') == $priority->id ? 'selected' : '' }} class="bg-slate-800">
                                            {{ $priority->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Category Filter -->
                                <select name="category_id" class="px-4 py-3 bg-white/5 border-2 border-white/10 rounded-xl text-white focus:outline-none focus:border-purple-400 appearance-none min-w-[150px]">
                                    <option value="" class="bg-slate-800">Todas Categorias</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }} class="bg-slate-800">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <button type="submit" class="px-6 py-3 bg-blue-500/20 hover:bg-blue-500/30 border border-blue-500/30 text-blue-300 rounded-xl transition-all duration-300">
                                    Filtrar
                                </button>
                            </div>

                            <!-- New Ticket Button -->
                            <a href="{{ route('tickets.create') }}" 
                               class="group relative inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-green-500/25">
                                <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-emerald-400 rounded-xl blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                                <svg class="relative w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="relative">Novo Ticket</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-green-500/10 backdrop-blur-sm border border-green-500/20 rounded-2xl p-6 hover:bg-green-500/20 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-300 text-sm font-medium">Abertos</p>
                            <p class="text-3xl font-bold text-white">{{ $stats['open'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-500/10 backdrop-blur-sm border border-yellow-500/20 rounded-2xl p-6 hover:bg-yellow-500/20 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-yellow-300 text-sm font-medium">Em Progresso</p>
                            <p class="text-3xl font-bold text-white">{{ $stats['in_progress'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-500/20 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-red-500/10 backdrop-blur-sm border border-red-500/20 rounded-2xl p-6 hover:bg-red-500/20 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-red-300 text-sm font-medium">Fechados</p>
                            <p class="text-3xl font-bold text-white">{{ $stats['closed'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-500/10 backdrop-blur-sm border border-purple-500/20 rounded-2xl p-6 hover:bg-purple-500/20 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-300 text-sm font-medium">Total</p>
                            <p class="text-3xl font-bold text-white">{{ $stats['total'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tickets List -->
            <div class="relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl blur opacity-25"></div>
                <div class="relative bg-white/5 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/10 overflow-x-hidden">
                    <!-- List Header -->
                    <div class="relative bg-gradient-to-r from-purple-600/80 to-pink-600/80 backdrop-blur-sm px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-white">Lista de Tickets</h2>
                            </div>
                            <div class="hidden sm:flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <span class="text-sm text-white/80">{{ $tickets->total() }} tickets encontrados</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tickets Content -->
                    <div class="p-8">
                        @if($tickets->count() > 0)
                            <div class="space-y-6">
                                @foreach($tickets as $ticket)
                                    <div class="group bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-2xl p-6 transition-all duration-300 cursor-pointer">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center space-x-3 mb-3">
                                                    <span class="text-sm font-mono text-purple-300 bg-purple-500/20 px-3 py-1 rounded-lg">#{{ $ticket->id }}</span>
                                                    
                                                    <!-- Status Badge -->
                                                    @if($ticket->status == 'open')
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-300 border border-green-500/30">
                                                            <div class="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                                                            Aberto
                                                        </span>
                                                    @elseif($ticket->status == 'in_progress')
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-300 border border-yellow-500/30">
                                                            <div class="w-2 h-2 bg-yellow-400 rounded-full mr-2"></div>
                                                            Em Progresso
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-300 border border-red-500/30">
                                                            <div class="w-2 h-2 bg-red-400 rounded-full mr-2"></div>
                                                            Fechado
                                                        </span>
                                                    @endif

                                                    <!-- Priority Badge -->
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                                        @if($ticket->priority->name == 'Alta' || $ticket->priority->name == 'Crítica')
                                                            bg-red-500/20 text-red-300 border border-red-500/30
                                                        @elseif($ticket->priority->name == 'Média')
                                                            bg-yellow-500/20 text-yellow-300 border border-yellow-500/30
                                                        @else
                                                            bg-green-500/20 text-green-300 border border-green-500/30
                                                        @endif
                                                    ">
                                                        {{ $ticket->priority->name }}
                                                    </span>

                                                    <!-- Category Badge -->
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-300 border border-blue-500/30">
                                                        {{ $ticket->category->name }}
                                                    </span>
                                                </div>
                                                
                                                <h3 class="text-xl font-semibold text-white mb-2 group-hover:text-purple-200 transition-colors">
                                                    {{ $ticket->title }}
                                                </h3>
                                                
                                                <p class="text-white/70 mb-4 line-clamp-2">
                                                    {{ Str::limit($ticket->description, 150) }}
                                                </p>
                                                
                                                <div class="flex items-center space-x-6 text-sm text-white/60">
                                                    <div class="flex items-center space-x-2">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                        </svg>
                                                        <span>{{ $ticket->user->name }}</span>
                                                    </div>
                                                    <div class="flex items-center space-x-2">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span>{{ $ticket->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    @if($ticket->closed_at)
                                                        <div class="flex items-center space-x-2">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            <span>Fechado {{ $ticket->closed_at->diffForHumans() }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="ml-6 flex items-center space-x-2">
                                                <a href="{{ route('tickets.show', $ticket->id) }}" class="p-2 text-white/60 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200" title="Ver detalhes">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="p-2 text-white/60 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200" title="Editar">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este ticket?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2 text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-lg transition-all duration-200" title="Excluir">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Pagination -->
                            <div class="flex items-center justify-between mt-12 pt-8 border-t border-white/10">
                                <div class="text-white/60">
                                    Mostrando <span class="font-semibold text-white">{{ $tickets->firstItem() }}-{{ $tickets->lastItem() }}</span> de <span class="font-semibold text-white">{{ $tickets->total() }}</span> tickets
                                </div>
                                <div class="flex items-center space-x-2">
                                    {{ $tickets->appends(request()->query())->links('pagination::tailwind') }}
                                </div>
                            </div>
                        @else
                            <!-- Empty State -->
                            <div class="text-center py-12">
                                <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-12 h-12 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-semibold text-white mb-2">Nenhum ticket encontrado</h3>
                                <p class="text-white/60 mb-6">Tente ajustar os filtros ou criar um novo ticket</p>
                                <a href="{{ route('tickets.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-semibold rounded-xl transition-all duration-300">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Criar Primeiro Ticket
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>