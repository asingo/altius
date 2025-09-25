@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" child="{{$title}}" />
        <div class="mt-8">

            <x-typography.heading location="page" class="mt-4">Contact Us</x-typography.heading>
            <x-typography.heading location="page" >Addresses and Phone Numbers</x-typography.heading>
        </div>
        <div class="mt-8"
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
    "
        >
            <span class="text-xl text-texthead">On this page</span>
            <div class="flex gap-2 md:gap-6 mt-2 border-b border-slate-300 flex-wrap pb-8">
                @foreach($data as $d)
                    <div @click="scrollTo('location{{$d['id']}}')" class="flex flex-shrink-0 items-center gap-2 text-primary hover:text-accent cursor-pointer">
                        <span class="text-xl">{{$d['title']}}</span>
                        <x-heroicon-o-arrow-down class="w-5"/>
                    </div>
                @endforeach
            </div>
            <div class="mt-12 flex flex-col gap-12">
                @foreach($data as $d)
                    <div id="location{{$d['id']}}">
                        <div class="flex flex-col md:w-5/12 gap-4">
                            <h3 class="text-3xl font-bold">{{$d['title']}}</h3>
                            <p>{{$d['address']}}</p>
                        </div>
                        <div class="grid grid-rows-3 items-center mt-6">
                            <div class="grid-cols-2 grid py-2 items-center border-textsub border-b-2">
                                <div>
                                    <span class="font-semibold text-lg text-textsub">Contact</span>
                                </div>
                                <div>
                                    <span class="font-semibold text-lg text-textsub">Number</span>
                                </div>
                            </div>
                            <div class="grid-cols-2 grid border-slate-300 border-b  py-2 items-center">
                                <div>
                                    <span class="text-lg text-textsub">General Number</span>
                                </div>
                                <div>
                                    <span class="text-lg text-textsub">{{$d['contact']['general']}}</span>
                                </div>
                            </div>
                            <div class="grid-cols-2 grid border-slate-300 border-b  py-2 items-center">
                                <div>
                                    <span class="text-lg text-textsub">Customer Care</span>
                                </div>
                                <div>
                                    <span class="text-lg text-textsub">{{$d['contact']['customer']}}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                    <div @click="window.scrollTo({top: 0, behavior: 'smooth'})" class="flex items-center gap-2 text-primary border-b border-slate-300  pb-4 hover:text-accent cursor-pointer" @click="scrollToTop()">
                        <span class="text-xl">Back On Top</span>
                        <x-heroicon-o-arrow-up class="w-5"/>
                    </div>
            </div>
        </div>
        <div class="mt-12">
            <h3 class="font-heading text-4xl" >Staff phone and email directories</h3>
            <p class="mt-4">
                Altius Hospitals doesn't have a public directory of staff phone numbers or email addresses. To contact someone, call the general telephone number at a Altius Hospitals location and the operator will connect you.</p>
        </div>
    </div>
@endsection
