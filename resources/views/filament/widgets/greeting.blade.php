<x-filament-widgets::widget>
    <div class="flex items-center gap-3">
        <x-filament::avatar size="lg"
            src="{{$this->getAvatar()}}"
        />
        <div>
            <small>{{date('l, d F Y')}}</small>
            <h1 class="font-semibold text-xl">Hello, {{auth()->user()->name}}</h1>
        </div>
    </div>
</x-filament-widgets::widget>
