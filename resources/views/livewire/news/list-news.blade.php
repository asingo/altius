<div class="flex flex-col gap-6">
    @foreach ($data as $n)
        <x-grid.news-grid title="{{$n['title']}}" slug="{{$n['slug']}}" category="{{$n['category']}}" date="{{$n['created_at']}}"/>
    @endforeach
    @if($data->count() < $rawData->count())
        <div class="text-center mt-4 flex items-center justify-center gap-2">
            <!-- Button -->
            <button
                wire:click="loadMore"
                wire:loading.attr="disabled"
                class="px-4 py-2 bg-primary text-white rounded-xl hover:bg-accent">
                Load More
            </button>

            <!-- Spinner -->
            <div wire:loading wire:target="loadMore" class="mt-2">
                <svg class="animate-spin h-6 w-6 text-primary mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
            </div>
        </div>
    @endif
</div>
