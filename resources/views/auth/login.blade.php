<!-- component -->
@vite('resources/css/app.css')
<link rel="shortcut icon" href="/upload/logo.png">
<x-auth-session-status class="mb-4" :status="session('status')" />
<!-- component -->
<!-- Container -->
<div class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10">
 
   <!-- Login component -->
   <div class="flex shadow-md">
        
     <!-- Login form -->
     <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 24rem; height: 32rem;">
      
       <div class="w-72">
         <!-- Heading -->
         <h1 class="text-xl font-semibold">Hello Dear!!</h1>
         <small class="text-gray-400">Welcome back! Please enter your details</small>
 
         <!-- Form -->
         <form method="POST" class="mb-4" action="{{ route('login') }}">
           @csrf
           <div class="mb-3">
             <label class="mb-2 block text-xs font-semibold">Email</label>
             <input type="email" placeholder="Enter your email" name="email" :value="old('email')" required autofocus autocomplete="username"
             class="block w-full rounded-md border border-gray-300 focus:border-purple-300 focus:outline-none focus:ring-1 focus:ring-purple-300 py-1 px-1.5 text-gray-500" />
             <x-input-error :messages="$errors->get('email')" class="mt-2" />
           </div>
 
           <div class="mb-3">
             <label class="mb-2 block text-xs font-semibold">Password</label>
             <input type="password" name="password"
             required autocomplete="current-password" placeholder="*****" class="block w-full rounded-md border border-gray-300 focus:border-purple-300 focus:outline-none focus:ring-1 focus:ring-purple-300 py-1 px-1.5 text-gray-500" />
             <x-input-error :messages="$errors->get('password')" class="mt-2" />
           </div>
 
           <div class="mb-3 flex flex-wrap content-center">
             <input id="remember" type="checkbox" class="mr-1 checked:bg-purple-300" /> <label for="remember" name="remember" class="mr-auto text-xs font-semibold">Remember </label>
             
             @if (Route::has('password.request'))
             <a class="text-xs font-semibold text-purple-900" href="{{ route('password.request') }}">
                 {{ __('Forgot your password?') }}
             </a>
         @endif
           </div>
 
           <div class="mb-3">
             <button class="mb-2 block w-full text-center text-white bg-purple-700 hover:bg-purple-400 px-2 py-1.5 rounded-md">Login</button>
             <a class="text-xs font-semibold text-purple-900" href="{{ route('auth.register') }}">
                {{ __('Create a new account?') }}
            </a>
        
           </div>
         </form>
         
 
         <!-- Footer -->
         <a type="button" class="px-3 mt-11 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800" href="/">Back</a>
         
         
       </div>
       
     </div>
 
     <!-- Login banner -->
     <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
       <img class="h-full w-full bg-center bg-no-repeat bg-cover rounded-r-md" src="{{asset('/upload/logo.png')}}">
     </div>
 
   </div>
 
  
 </div>
 