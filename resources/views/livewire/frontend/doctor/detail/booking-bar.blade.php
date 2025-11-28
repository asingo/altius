<div class="bg-white px-6 py-2 drop-shadow-[0_-3px_10px_rgba(0,0,0,0.1)] rounded-t-2xl flex-col sm:flex-row max-w-screen-2xl mx-auto flex justify-between gap-2 sm:items-center">
    <div>
        <p class="text-textsub">
            @if(app()->getLocale() == 'en')
            Book your Appointment now with
            @else
                Buat Janji Temu dengan
            @endif
        </p>
        <h6 class="font-bold">{{$name}}</h6>
    </div>
    <div>
        @php
            $text = 'Hi Altius, I want to book an appoinment with' . $name
        @endphp
        <x-button.link href="https://wa.me/{{$customerCare}}/?text={{filter_var($text, FILTER_SANITIZE_ENCODED)}}" class="w-full sm:w-fit text-center">
            @if(app()->getLocale() == 'en')
                Book Now
            @else
                Buat Janji Temu
            @endif
        </x-button.link>
    </div>

</div>
