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
     <div class="flex flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 29rem; height: 40rem;">
       <div class="w-72">
         <!-- Heading -->
         <h1 class="text-xl font-semibold">Join Us</h1>
         <small class="text-gray-400">Welcome back! Please enter your details to Join</small>
 
         <!-- Form -->
         <form method="POST" class="mb-4" action="{{ route('register') }}">
           @csrf
           <div>
            <label for="" class="block font-medium text-xl text-black mt-2">Select Role</label>
            <select name="role" class="block mt-1 w-full">
                     <option value="instructor">As Instructor</option>
                     <option value="user">As User</option>
    
            </select>
           </div>
        
           <div class="mb-3 mt-1">
            <label class="mb-2 block text-xs font-semibold">Username</label>
            <input type="text"name="username" :value="old('username')" required autofocus autocomplete="username"
            class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
          </div>
          <div class="mb-3">
            <label class="mb-2 block text-xs font-semibold">Name</label>
            <input type="text" placeholder="" name="name" :value="old('name')" required autofocus autocomplete="name"
            class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
           <div class="mb-3">
             <label class="mb-2 block text-xs font-semibold">Email</label>
             <input type="email" placeholder="" name="email" :value="old('email')" required autofocus autocomplete="username"
             class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
             <x-input-error :messages="$errors->get('email')" class="mt-2" />
           </div>
 
           <div class="mb-3">
             <label class="mb-2 block text-xs font-semibold">Password</label>
             <input type="password" name="password"
             required autocomplete="current-password" placeholder="" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
             <x-input-error :messages="$errors->get('password')" class="mt-2" />
           </div>
           <div class="mb-3">
            <label class="mb-2 block text-xs font-semibold">Confirm Password</label>
            <input type="password" name="password_confirmation"
            required autocomplete="current-password" placeholder="" class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>
 
          
          <a class="text-xs font-semibold text-purple-700" href="{{ route('login') }}">
            {{ __('Already Registered?') }}
         </a> 
           <div class="mb-3 mt-2">
           
             <button class="mb-1.5 block w-full text-center text-white bg-purple-700 hover:bg-purple-900 px-2 py-1.5 rounded-md">Register</button>
            
           </div>
         </form>
 
         <!-- Footer -->
         <a type="button" class="px-3 mt-5 py-2 text-xs font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800" href="/">Back</a>
       </div>
     </div>
 
     <!-- Login banner -->
     <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 27rem; height: 40rem;">
       <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="{{asset('/upload/logo.png')}}">
     </div>
 
   </div>
 
  
 </div>