@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" subparent="Medical Professional" subparentlink="/medical-professional" child="{{$title}}"/>
        <div class="mt-8 border-b-2 border-slate-300">
            <x-typography.subheading location="page">{{$data['speciality']}}</x-typography.subheading>
            <x-typography.heading location="page">{{$title}}
            </x-typography.heading>
        </div>
        <div class="flex flex-col-reverse md:grid md:grid-cols-5 mt-10 gap-12 md:gap-24">
            <div class="col-span-3 border-b-2 pb-12 border-slate-300">
                <div class="flex gap-2.5 items-center mb-6">
                    <x-button.link class="!bg-texthead rounded-xl">Overview</x-button.link>
                    <x-button.link href="#pub" class="!bg-shade rounded-xl !text-primary">Publication</x-button.link>
                </div>
                @livewire('frontend.doctor.detail.location-select', ['data' => $data['location']])
            </div>
            <div class="md:col-span-2 md:mr-24 md:border-b-2 md:border-slate-300 w-full">
                <img src="{{asset($data['profile'])}}" alt="image" class="rounded-2xl w-full">
            </div>
        </div>
        <div
            x-data="{
        active: '',
        sections: [],
        scrollTo(id) {
            const el = document.getElementById(id)
            if (!el) return
            const y = el.getBoundingClientRect().top + window.scrollY - 100 // offset 100px
            window.scrollTo({ top: y, behavior: 'smooth' })

        }
    }"
            x-init="
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
               if (entry.isIntersecting) {

                   active = entry.target.id
                    if (window.innerWidth < 768) { // only mobile
                        const btn = document.querySelector(`button[data-id='${entry.target.id}']`)
                        btn?.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' })
                    }
                }
            })
        }, {threshold: 0.5});



        document.querySelectorAll('.col-span-3 > div[id]').forEach(sec => {
            sections.push({
                id: sec.id,
                title: sec.querySelector('h3')?.innerText ?? sec.id
            })
            observer.observe(sec)
        })
    "
            class="flex flex-col-reverse md:grid md:grid-cols-5 mt-12 gap-12 md:gap-24"
        >
            <div class="col-span-3 space-y-12">
                <div id="bio">
                    <h3 class="text-4xl font-heading">Biographical Summary</h3>
                    <div class="mt-8">{!! $data['biography'] !!}</div>
                </div>

                <div id="expertise">
                    <h3 class="text-4xl font-heading">Expertise</h3>
                    <div class="mt-8">{!! $data['expertise'] !!}</div>
                </div>

                <div id="edu">
                    <h3 class="text-4xl font-heading">Education</h3>
                    <div class="mt-8">{!! $data['education'] !!}</div>
                </div>

                <div id="loc">
                    <h3 class="text-4xl font-heading">Location</h3>
                    <div class="mt-8">
                        <div class="flex gap-3 md:gap-6">
                            <div class="w-[250px]">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5139.30867021181!2d106.97948867605082!3d-6.15443176032545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b3ab886b6fb%3A0x781659f27c35be4e!2sAltius%20Hospitals%20Harapan%20Indah!5e1!3m2!1sid!2sid!4v1758610019630!5m2!1sid!2sid"
                                    width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="flex flex-col gap-3 "><h3 class="text-2xl text-textsub font-semibold">Altius
                                    Hospitals Puri Indah</h3>
                                <div class="text-textsub text-lg mb-4">Cardiology, Urology, Orthopedic</div>
                                <a href="#"
                                   class="text-primary hover:text-accent gap-2 items-center text-lg flex w-4/5 justify-between">
                                    <div class="flex gap-2">
                                        <x-heroicon-s-map-pin class="w-7 h-7"/>
                                        <span>Building & Maps</span></div>
                                    <x-heroicon-o-chevron-right class="w-7 h-7"/>
                                </a> <a href="#"
                                        class="text-primary hover:text-accent gap-2 items-center text-lg flex w-4/5 justify-between">
                                    <div class="flex gap-2">
                                        <x-heroicon-s-phone class="w-7 h-7"/>
                                        <span>Contact Us</span></div>
                                    <x-heroicon-o-chevron-right class="w-7 h-7"/>
                                </a></div>
                        </div>
                    </div>
                </div>

                <div id="pub">
                    <h3 class="text-4xl font-heading">Publication</h3>
                    <div class="mt-8">{!! $data['publications'] !!}</div>
                </div>
            </div>

            <div class="col-span-2 md:mr-24 sticky top-16 md:top-24 bg-white">
                <div
                    class="flex md:flex-col w-full py-6 md:py-0 flex-nowrap overflow-x-auto text-lg text-primary md:sticky md:top-24 md:px-10 gap-4 md:space-y-4">
                    <template x-for="sec in sections" :key="sec.id">
                        <button
                            :data-id="sec.id"
                            @click="scrollTo(sec.id); active = sec.id"
                            class="text-left transition-colors flex gap-2 items-center w-full text-nowrap flex-nowrap"
                            :class="active === sec.id
                        ? 'font-bold text-texthead before:h-[1em] before:w-1 before:bg-texthead before:flex'
                        : 'text-primary'"
                            x-text="sec.title"
                        ></button>
                    </template>
                </div>
            </div>

        </div>


    </div>
@endsection
