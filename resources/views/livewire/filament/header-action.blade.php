<div class="flex items-center gap-2">
{{--    {{$actions}}--}}
    @if ($actions)
        <x-filament::actions :actions="$actions" />
    @endif
</div>
{{--@if (isset($this) && $this instanceof \Filament\Pages\Page)--}}
{{--    <div class="flex items-center gap-2">--}}
{{--        <x-filament::actions :actions="$this->getHeaderActions()" />--}}
{{--    </div>--}}
{{--@endif--}}
