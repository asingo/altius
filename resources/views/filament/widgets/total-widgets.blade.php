@php use App\Models\Career;use App\Models\Doctor;use App\Models\Pages;use Awcodes\Curator\Models\Media; @endphp
<x-filament-widgets::widget>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="flex items-center bg-white rounded-xl gap-2 p-3">
            <div class="bg-gray-50 p-3 rounded-lg">
                <x-icon-doctor class="text-primary-600 w-8 h-8"/>
            </div>
            <div>
                <span>Total Doctor</span>
                <h1 class="text-xl font-semibold">{{Doctor::get()->count()}}</h1>
            </div>
        </div>
        <div class="flex items-center bg-white rounded-xl gap-2 p-3">
            <div class="bg-gray-50 p-3 rounded-lg">
                <x-icon-media class="text-primary-600 w-8 h-8"/>
            </div>
            <div>
                <span>Media Uploaded</span>
                <h1 class="text-xl font-semibold">{{Media::get()->count()}}</h1>
            </div>
        </div>
        <div class="flex items-center bg-white rounded-xl gap-2 p-3">
            <div class="bg-gray-50 p-3 rounded-lg">
                <x-icon-pages class="text-primary-600 w-8 h-8"/>
            </div>
            <div>
                <span>Total Pages</span>
                <h1 class="text-xl font-semibold">{{Pages::get()->count()}}</h1>
            </div>
        </div>
        <div class="flex items-center bg-white rounded-xl gap-2 p-3">
            <div class="bg-gray-50 p-3 rounded-lg">
                <x-icon-careers class="text-primary-600 w-8 h-8"/>
            </div>
            <div>
                <span>Total Careers</span>
                <h1 class="text-xl font-semibold">{{Career::get()->count()}}</h1>
            </div>
        </div>
    </div>

</x-filament-widgets::widget>
