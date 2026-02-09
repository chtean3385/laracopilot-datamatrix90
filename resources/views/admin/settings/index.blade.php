@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Site Settings</h1>
        <p class="text-gray-600 mt-2">Manage your website settings, contact information, and footer content</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- General Settings Section -->
            <div class="border-b border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">General Settings</h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Site Name *</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings->site_name) }}" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('site_name') border-red-500 @enderror" 
                           required placeholder="Wildlife Photography">
                    @error('site_name')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="border-b border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Contact Information</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Contact Email</label>
                        <input type="email" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('contact_email') border-red-500 @enderror" 
                               placeholder="info@wildlifephoto.com">
                        @error('contact_email')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Contact Phone</label>
                        <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings->contact_phone) }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('contact_phone') border-red-500 @enderror" 
                               placeholder="+1 (555) 123-4567">
                        @error('contact_phone')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Contact Address</label>
                    <input type="text" name="contact_address" value="{{ old('contact_address', $settings->contact_address) }}" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('contact_address') border-red-500 @enderror" 
                           placeholder="123 Safari Lane, Wildlife Reserve, CA 90210">
                    @error('contact_address')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Social Media Links Section -->
            <div class="border-b border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Social Media Links</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Facebook URL</label>
                        <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings->facebook_url) }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('facebook_url') border-red-500 @enderror" 
                               placeholder="https://facebook.com/yourpage">
                        @error('facebook_url')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Instagram URL</label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings->instagram_url) }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('instagram_url') border-red-500 @enderror" 
                               placeholder="https://instagram.com/yourpage">
                        @error('instagram_url')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Twitter URL</label>
                        <input type="url" name="twitter_url" value="{{ old('twitter_url', $settings->twitter_url) }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('twitter_url') border-red-500 @enderror" 
                               placeholder="https://twitter.com/yourpage">
                        @error('twitter_url')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">YouTube URL</label>
                        <input type="url" name="youtube_url" value="{{ old('youtube_url', $settings->youtube_url) }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('youtube_url') border-red-500 @enderror" 
                               placeholder="https://youtube.com/yourchannel">
                        @error('youtube_url')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Footer Content Section -->
            <div class="border-b border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Footer Content</h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Footer About Text</label>
                    <textarea name="footer_about" rows="3" 
                              class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('footer_about') border-red-500 @enderror" 
                              placeholder="Brief description about your photography business...">{{ old('footer_about', $settings->footer_about) }}</textarea>
                    <p class="text-gray-500 text-sm mt-1">This text appears in the footer About section</p>
                    @error('footer_about')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Copyright Text</label>
                    <input type="text" name="copyright_text" value="{{ old('copyright_text', $settings->copyright_text) }}" 
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('copyright_text') border-red-500 @enderror" 
                           placeholder="© 2024 Wildlife Photography. All rights reserved.">
                    <p class="text-gray-500 text-sm mt-1">Copyright notice displayed at the bottom of every page</p>
                    @error('copyright_text')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="p-6 bg-gray-50 rounded-b-lg">
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="window.location.reload()" 
                            class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition-colors duration-300">
                        Reset
                    </button>
                    <button type="submit" 
                            class="bg-gradient-to-r from-blue-600 to-blue-800 text-white px-6 py-2 rounded-lg hover:from-blue-700 hover:to-blue-900 transition-all duration-300 shadow-lg">
                        Save Settings
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Preview Section -->
    <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
        <h2 class="text-xl font-bold text-blue-800 mb-3">💡 Preview & Tips</h2>
        <ul class="space-y-2 text-gray-700">
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <span>Changes to footer content will appear on all pages immediately after saving</span>
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <span>Social media icons only display if URLs are provided</span>
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <span>Contact information appears in the footer's Contact column</span>
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <span>View your website's homepage to see footer changes in action</span>
            </li>
        </ul>
    </div>
</div>
@endsection