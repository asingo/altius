<div>
    <div class="{{ $sitemap ? 'bg-green-100 border-green-400 text-green-700':'bg-red-100 border-red-400 text-red-700' }} border w-fit flex gap-2 items-center px-4 py-2 rounded-xl relative mb-4"
    >
        @if($sitemap)
        <x-heroicon-o-check-circle class="w-5 h-5"/>
            <span class="text-sm">Sitemap is Created. Click Generate Sitemap to Regenerate Sitemap.</span>
        @else
            <x-heroicon-o-x-circle class="w-5 h-5"/>
            <span class="text-sm">Sitemap not created yet. Click Generate Sitemap to Generate Sitemap.</span>
        @endif

    </div>
    <div>
        <x-filament::button wire:click="generateSitemap" outlined="true">Generate Sitemap</x-filament::button>
    </div>
</div>
