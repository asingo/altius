<div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
            <img src="{{ asset('asset/Image-about.png') }}" alt="icon" class="w-full">
        </div>
        <div>
            <x-typography.subheading location="section">Experience peace of mind</x-typography.subheading>
            <h2 class="text-primary text-3xl font-medium my-2">When Your Health, Is Our Priority</h2>
            <p>
                Altius Hospitals delivers international-standard healthcare with the genuine warmth of Indonesian
                hospitality. Supported by advanced medical technology and
                experienced professionals, we are committed to providing the highest quality
                care for your optimal health and peace of mind.
            </p>
            <x-button.link href="{{route('about')}}" class="mt-6">Learn More About Us</x-button.link>
        </div>
    </div>

</div>
