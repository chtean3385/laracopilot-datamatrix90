@extends('layouts.admin')

@section('title', 'Social Media Feeds')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">Social Media Feeds</h2>
        <p class="text-gray-600 mt-1">Manage your Instagram and Facebook feed integration</p>
    </div>
    <form action="{{ route('admin.social.refresh') }}" method="POST">
        @csrf
        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
            <i class="fas fa-sync mr-2"></i>Refresh Feeds
        </button>
    </form>
</div>

<div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
    <div class="flex items-start">
        <i class="fas fa-info-circle text-yellow-600 text-xl mr-3 mt-1"></i>
        <div>
            <h4 class="font-bold text-yellow-800 mb-1">API Integration Required</h4>
            <p class="text-yellow-700 text-sm">To display live social media feeds, you need to integrate with Instagram and Facebook APIs. Configure your API credentials in the Settings section.</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($feeds->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @foreach($feeds as $feed)
                <div class="bg-white border rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                    @if($feed->image_url)
                        <img src="{{ $feed->image_url }}" alt="Social post" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <div class="flex items-center mb-3">
                            @if($feed->platform === 'instagram')
                                <i class="fab fa-instagram text-pink-500 text-xl mr-2"></i>
                            @else
                                <i class="fab fa-facebook text-blue-600 text-xl mr-2"></i>
                            @endif
                            <span class="font-semibold text-gray-900">{{ ucfirst($feed->platform) }}</span>
                            <span class="text-gray-500 text-sm ml-auto">{{ $feed->posted_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-700 text-sm mb-4">{{ Str::limit($feed->content, 120) }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ $feed->post_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-700 text-sm font-semibold">
                                View on {{ ucfirst($feed->platform) }}
                            </a>
                            <form action="{{ route('admin.social.destroy', $feed->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this feed?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="px-6 py-4 border-t">
            {{ $feeds->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-share-alt text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-bold text-gray-700 mb-2">No Social Feeds Yet</h3>
            <p class="text-gray-500 mb-6">Configure your social media API integration to display feeds automatically.</p>
            <a href="{{ route('admin.settings.index') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors">
                Configure Settings
            </a>
        </div>
    @endif
</div>
@endsection
