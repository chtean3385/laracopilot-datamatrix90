<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - WildShots</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-black">
    <div class="min-h-screen flex">
        <!-- Left Side - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-black mb-2">
                        <span class="text-white">WILD</span><span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">SHOTS</span>
                    </h1>
                    <p class="text-gray-400 text-sm font-semibold">Admin Control Panel</p>
                </div>
                
                <!-- Login Card -->
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl shadow-2xl p-8 border border-gray-700">
                    <h2 class="text-2xl font-bold text-white mb-2">Welcome Back</h2>
                    <p class="text-gray-400 mb-6">Sign in to manage your wildlife portfolio</p>
                    
                    @if($errors->any())
                        <div class="bg-red-500/10 border border-red-500 text-red-500 rounded-lg p-4 mb-6">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif
                    
                    <form action="/admin/login" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label class="block text-gray-300 font-semibold mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-500"></i>
                                </div>
                                <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent" placeholder="admin@wildshots.com" required>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-gray-300 font-semibold mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-500"></i>
                                </div>
                                <input type="password" name="password" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent" placeholder="••••••••" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-orange-600 text-white font-bold py-3 rounded-lg hover:shadow-xl hover:shadow-orange-500/50 transition-all duration-300 mb-6">
                            <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                        </button>
                    </form>
                    
                    <!-- Test Credentials -->
                    <div class="bg-gray-800/50 rounded-lg p-4 border border-gray-700">
                        <h3 class="text-sm font-bold text-amber-500 mb-3 flex items-center">
                            <i class="fas fa-key mr-2"></i>Test Credentials
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Email:</span>
                                <span class="text-white font-mono">admin@photography.com</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Password:</span>
                                <span class="text-white font-mono">admin123</span>
                            </div>
                            <hr class="border-gray-700 my-2">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Email:</span>
                                <span class="text-white font-mono">photographer@studio.com</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Password:</span>
                                <span class="text-white font-mono">photo123</span>
                            </div>
                            <hr class="border-gray-700 my-2">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Email:</span>
                                <span class="text-white font-mono">manager@photography.com</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Password:</span>
                                <span class="text-white font-mono">manager123</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Back to Site -->
                <div class="text-center mt-6">
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-amber-500 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Website
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Hero Image -->
        <div class="hidden lg:block lg:w-1/2 relative">
            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&q=80" alt="Mountain Landscape" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/40 to-transparent"></div>
            <div class="absolute inset-0 flex items-center justify-center text-center p-12">
                <div>
                    <h2 class="text-5xl font-black text-white mb-4 leading-tight">
                        Manage Your<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">Wild Portfolio</span>
                    </h2>
                    <p class="text-xl text-gray-200">Control gallery, events, and content</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
