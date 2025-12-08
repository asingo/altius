<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="{
    preview: null,
    state: $wire.$entangle('{{ $getStatePath() }}'),

    init() {

        // Jika state kosong, tidak perlu apa-apa
        if (!this.state) {
            return;
        }

        // Jika state berupa array → ambil file pertama
        if (Array.isArray(this.state)) {
            this.state = this.state[0] ?? null;
        }

        // Jika state berupa string (path), buat preview
        if (typeof this.state === 'string' && this.state !== '') {
            this.preview = this.state.startsWith('http')
                ? this.state
                : '{{ Storage::disk($getDiskName())->url('') }}' + this.state;
        }
    },

    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;

        // Preview di browser
        const reader = new FileReader();
        reader.onload = (e) => {
            this.preview = e.target.result;
        };
        reader.readAsDataURL(file);

        // Upload ke Livewire temp folder
        //$wire.upload('{{ $getStatePath() }}', file);
    },
}"

        class="flex items-center gap-4"
    >

        {{-- Circle Preview --}}
        <div class="w-16 h-16 rounded-full bg-blue-900 text-white flex items-center justify-center text-xl font-semibold overflow-hidden">
            <template x-if="preview">
                <img :src="preview" class="w-full h-full object-cover" />
            </template>

            <template x-if="!preview">
                <span>
                    {{ strtoupper(substr($getState() ?? 'U', 0, 1)) }}
                </span>
            </template>
        </div>
        {{-- Upload Button --}}
        <label class="
            border border-blue-900 text-blue-900 px-4 py-2 rounded-xl cursor-pointer
            flex items-center gap-2 transition-all duration-200
            hover:bg-blue-900 hover:text-white hover:shadow-md hover:-translate-y-0.5
        ">
            {{__('Upload Photo')}}
            <x-heroicon-o-arrow-up-tray class="w-4 h-4"/>
            <input
                type="file"
                class="hidden"
                x-on:change="fileChosen"
                wire:model="{{$getStatePath()}}"
            >
        </label>

    </div>
</x-dynamic-component>
