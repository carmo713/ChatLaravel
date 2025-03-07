<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center px-4 py-8">
       <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <svg class="w-20 h-20 mx-auto text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
            <h2 class="mt-4 text-3xl font-extrabold text-gray-900">Create Your Account</h2>
            <p class="mt-2 text-sm text-gray-600">Join our community today</p>
        </div>
   
           <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
               <div class="p-8">
                   <!-- Validation Errors -->
                   <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />
   
                   <form method="POST" action="{{ route('register') }}">
                       @csrf
   
                       <!-- Name -->
                       <div class="mt-4">
                           <label class="block text-sm font-medium text-gray-700 mb-2">
                               {{ __('Name') }}
                           </label>
                           <div class="relative">
                               <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                   </svg>
                               </div>
                               <input 
                                   id="name" 
                                   type="text"
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required 
                                   autofocus
                                   autocomplete="name"
                                   class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 @error('name') border-red-500 @enderror"
                               >
                               @error('name')
                                   <p class="mt-1 text-xs text-red-500">
                                       {{ $message }}
                                   </p>
                               @enderror
                           </div>
                       </div>
   
                       <!-- Email Address -->
                       <div class="mt-4">
                           <label class="block text-sm font-medium text-gray-700 mb-2">
                               {{ __('Email') }}
                           </label>
                           <div class="relative">
                               <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                   </svg>
                               </div>
                               <input 
                                   id="email" 
                                   type="email"
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required
                                   autocomplete="email"
                                   class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 @error('email') border-red-500 @enderror"
                               >
                               @error('email')
                                   <p class="mt-1 text-xs text-red-500">
                                       {{ $message }}
                                   </p>
                               @enderror
                           </div>
                       </div>
   
                       <!-- Password -->
                       <div class="mt-4">
                           <label class="block text-sm font-medium text-gray-700 mb-2">
                               {{ __('Password') }}
                           </label>
                           <div class="relative">
                               <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                   </svg>
                               </div>
                               <input 
                                   id="password" 
                                   type="password"
                                   name="password" 
                                   required
                                   autocomplete="new-password"
                                   class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 @error('password') border-red-500 @enderror"
                               >
                               @error('password')
                                   <p class="mt-1 text-xs text-red-500">
                                       {{ $message }}
                                   </p>
                               @enderror
                           </div>
                       </div>
   
                       <!-- Confirm Password -->
                       <div class="mt-4">
                           <label class="block text-sm font-medium text-gray-700 mb-2">
                               {{ __('Confirm Password') }}
                           </label>
                           <div class="relative">
                               <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                   </svg>
                               </div>
                               <input 
                                   id="password-confirm" 
                                   type="password"
                                   name="password_confirmation" 
                                   required
                                   autocomplete="new-password"
                                   class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                               >
                           </div>
                       </div>
   
                       <div class="mt-6 flex items-center justify-between">
                           <a 
                               href="{{ route('login') }}" 
                               class="text-sm text-blue-600 hover:text-blue-500 transition duration-300"
                           >
                               {{ __('Already registered?') }}
                           </a>
   
                           <button 
                               type="submit" 
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300 transform hover:scale-[1.02] active:scale-[0.98]"
                           >
                               {{ __('Register') }}
                           </button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
    </div>
   </x-guest-layout>