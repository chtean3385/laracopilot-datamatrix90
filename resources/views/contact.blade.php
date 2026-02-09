@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">Get In Touch</h1>
        <p class="text-xl text-indigo-100">Let's discuss your photography needs</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Send Us a Message</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                    </div>
                @endif
                
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Your Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('name') border-red-500 @enderror" required>
                        @error('name')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-red-500 @enderror" required>
                        @error('email')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('subject') border-red-500 @enderror" required>
                        @error('subject')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Message</label>
                        <textarea name="message" rows="6" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                        <i class="fas fa-paper-plane mr-2"></i>Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Info -->
            <div>
                <div class="bg-gray-50 rounded-lg p-8 mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                <i class="fas fa-envelope text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Email</h4>
                                <p class="text-gray-600">{{ $settings->email ?? 'contact@photography.com' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                <i class="fas fa-phone text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Phone</h4>
                                <p class="text-gray-600">{{ $settings->phone ?? '+1 (555) 123-4567' }}</p>
                            </div>
                        </div>
                        
                        @if(isset($settings) && $settings->address)
                            <div class="flex items-start">
                                <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                                    <i class="fas fa-map-marker-alt text-indigo-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Address</h4>
                                    <p class="text-gray-600">{{ $settings->address }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="bg-indigo-50 rounded-lg p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        @if(isset($settings) && $settings->facebook_url)
                            <a href="{{ $settings->facebook_url }}" target="_blank" class="bg-white rounded-lg p-4 hover:bg-indigo-600 hover:text-white transition-colors text-2xl">
                                <i class="fab fa-facebook"></i>
                            </a>
                        @endif
                        @if(isset($settings) && $settings->instagram_url)
                            <a href="{{ $settings->instagram_url }}" target="_blank" class="bg-white rounded-lg p-4 hover:bg-pink-600 hover:text-white transition-colors text-2xl">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if(isset($settings) && $settings->twitter_url)
                            <a href="{{ $settings->twitter_url }}" target="_blank" class="bg-white rounded-lg p-4 hover:bg-blue-400 hover:text-white transition-colors text-2xl">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if(isset($settings) && $settings->linkedin_url)
                            <a href="{{ $settings->linkedin_url }}" target="_blank" class="bg-white rounded-lg p-4 hover:bg-blue-700 hover:text-white transition-colors text-2xl">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
