<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Nemira Inventory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0A052E] antialiased min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-[35px] shadow-2xl w-full max-w-[850px] flex overflow-hidden border-none">
        
        <div class="bg-[#000444] w-[40%] p-12 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 flex gap-1">
                    <div class="w-2 h-full bg-white opacity-40 rounded-sm"></div>
                    <div class="w-2 h-full bg-white rounded-sm"></div>
                    <div class="w-2 h-full bg-white opacity-70 rounded-sm"></div>
                </div>
                    <h1 class="text-5xl font-extrabold text-white tracking-tighter">Nemira</h1>
                </div>
                <p class="text-xl text-white font-medium opacity-90">inventory system</p>
            </div>
        </div>

        <div class="w-[55%] p-16 bg-[#F8FAFC] flex flex-col justify-center">
            <form method="POST" action="{{ route('login') }}" class="space-y-7">
                @csrf

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="space-y-2">
                    <label for="email" class="text-lg font-bold text-black ml-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                        class="w-full h-14 px-6 border-2 border-gray-200 rounded-2xl focus:border-[#2563EB] focus:ring-0 transition-all duration-200 text-lg">
                    @if($errors->has('email'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="space-y-2">
                    <label for="password" class="text-lg font-bold text-black ml-1">Password</label>
                    <input id="password" type="password" name="password" required 
                        class="w-full h-14 px-6 border-2 border-gray-200 rounded-2xl focus:border-[#2563EB] focus:ring-0 transition-all duration-200 text-lg">
                    @if($errors->has('password'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="flex items-center justify-end gap-6 pt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           class="text-sm font-bold text-[#2563EB] hover:underline decoration-2 underline-offset-4">
                            Forgot password?
                        </a>
                    @endif

                    <button type="submit" 
                        class="bg-[#0055A5] text-white px-12 py-4 rounded-2xl font-black text-lg shadow-[0_10px_20px_rgba(0,85,165,0.3)] hover:bg-blue-800 hover:-translate-y-0.5 transition-all active:scale-95">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>