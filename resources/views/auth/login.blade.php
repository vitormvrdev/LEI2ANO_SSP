@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-600 to-purple-700 flex items-center py-5">
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl overflow-hidden border-0">
                    <div class="p-12">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-6">
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2 md:text-right md:pr-4">
                                    {{ __('Email Address') }}
                                </label>
                                <div class="md:ml-auto md:w-3/4">
                                    <input 
                                        id="email" 
                                        type="email" 
                                        class="w-full px-4 py-3 text-base bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/25 transition-all duration-300 @error('email') border-red-500 @enderror" 
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        required 
                                        autocomplete="email" 
                                        autofocus
                                    >
                                    @error('email')
                                        <div class="text-red-500 text-sm font-medium mt-2">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 md:text-right md:pr-4">
                                    {{ __('Password') }}
                                </label>
                                <div class="md:ml-auto md:w-3/4">
                                    <input 
                                        id="password" 
                                        type="password" 
                                        class="w-full px-4 py-3 text-base bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/25 transition-all duration-300 @error('password') border-red-500 @enderror" 
                                        name="password" 
                                        required 
                                        autocomplete="current-password"
                                    >
                                    @error('password')
                                        <div class="text-red-500 text-sm font-medium mt-2">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-6">
                                <div class="md:ml-auto md:w-3/4">
                                    <div class="flex items-center">
                                        <input 
                                            class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2" 
                                            type="checkbox" 
                                            name="remember" 
                                            id="remember" 
                                            {{ old('remember') ? 'checked' : '' }}
                                        >
                                        <label class="ml-2 text-sm font-medium text-gray-700" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-0">
                                <div class="md:ml-auto md:w-3/4 flex flex-wrap items-center gap-4">
                                    <button 
                                        type="submit" 
                                        class="bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/50"
                                    >
                                        {{ __('Login') }}
                                    </button>

                                    <a 
                                        href="{{ route('register') }}"
                                        class="border-2 border-indigo-500 text-indigo-600 hover:text-white hover:bg-indigo-500 font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/50"
                                    >
                                        {{ __('Register') }}    
                                    </a>

                                    @if (Route::has('password.request'))
                                        <a 
                                            class="ml-auto text-indigo-600 hover:text-purple-600 font-medium transition-colors duration-300 hover:underline" 
                                            href="{{ route('password.request') }}"
                                        >
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
