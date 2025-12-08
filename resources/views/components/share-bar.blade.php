@props(['title'])
<div class="bg-slate-50 my-24 py-2 text-lg rounded-xl flex justify-center items-center">
    <span class="me-3">{{__('Share to')}}</span>
    <a href="whatsapp://send?text={{\Illuminate\Support\Str::sanitizeHtml($title . ' ')}}{{request()->url()}}"
       class="mx-2">
        <x-icon-whatsapp/>
    </a> <a href="https://facebook.com/share.php?u={{request()->url()}}" class="mx-2">
        <x-icon-facebook/>
    </a>
    <a href="http://www.linkedin.com/shareArticle?mini=true&url={{request()->url()}}"
        class="mx-2 w-9 h-9 bg-primary rounded-full"
    >
        <x-icon-linkedin class="  fill-white  p-2.5"/>

    </a>
    <button
        class="mx-2 relative"
        x-data="{showTooltip: false}"
        @click="navigator.clipboard.writeText(`{{request()->url()}}`); showTooltip = true"
        @mouseleave="showTooltip = false"
    >
        <x-heroicon-o-document-duplicate class="w-9 h-9 bg-primary text-white rounded-full p-2"/>
        <span class="absolute -top-8 right-0 -mt-2 -mr-2 px-2 py-1 text-white bg-gray-800 rounded-md" x-show="showTooltip">Copied</span>
    </button>
</div>
