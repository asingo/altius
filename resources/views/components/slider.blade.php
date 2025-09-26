@props(['id' => '', 'items' => '', 'items_mobile' => '', 'centered' => '', 'infinity' => '', 'arrow' => '', 'class' => '', 'autoplay' => ''])
<style>
    /*.slider-container {*/
    /*    position: relative;*/
    /*}*/


    {{--    {{'.slider-'.$id}} .swiper {--}}
{{--        @if($arrow != 'bottom-right')--}}
{{--          width: calc(100% - 150px);--}}
{{--        @else--}}
{{--          width: 100%;--}}
{{--    @endif--}}


{{--    }--}}

    {{'.slider-'.$id}} .swiper-button-next,
    {{'.slider-'.$id}} .swiper-button-prev {
        color: #525252;
        border: 1px solid #525252;
        border-radius: 100%;
        /*padding: 20px;*/
        /*height: 48px;*/
        /*width: 48px;*/
    }

    {{--    @if($arrow == 'bottom-right')--}}
    {{--    {{'.slider-'.$id}} .swiper-navigation{--}}
    {{--        position:relative;--}}
    {{--        right: 0;--}}
    {{--        bottom: 0px;--}}
    {{--        /*height: 100%;*/--}}
    {{--        /*display: flex;*/--}}
    {{--        /*margin-top: 20px;*/--}}
    {{--        /*gap: 10px;*/--}}
    {{--        /*justify-content: right;*/--}}
    {{--    }--}}
    {{--    {{'.slider-'.$id}} .swiper-button-next{--}}
    {{--        right: 0px !important;--}}
    {{--        left: unset;--}}
    {{--    }--}}
    {{--    {{'.slider-'.$id}} .swiper-button-prev{--}}
    {{--        right: 60px !important;--}}
    {{--        left: unset;--}}
    {{--    }--}}
    {{--    @endif--}}


    {{--    {{'.slider-'.$id}} .swiper-button-next:after,--}}
    {{--    {{'.slider-'.$id}} .swiper-button-prev:after {--}}
    {{--        font-size: 20px;--}}
    {{--    }--}}
</style>

<div class="slider-container slider-{{$id}} relative">
    <div class="swiper {{$class}} {{$arrow != 'bottom-right' ? 'w-full lg:w-[calc(100%-150px)]': 'w-full'}}">
        <div class="swiper-wrapper">
            {{$slot}}
        </div>
    </div>
    <div class="swiper-navigation {{$arrow == 'bottom-right' ? 'relative right-0 -bottom-2 xs:bottom-0' :
'flex gap-7 justify-center  mt-10  2xl:bottom-1/2' }}
">
        <div class="swiper-button-prev after:!text-[16px] sm:after:!text-[20px] !p-4.5 !w-[36px] !h-[36px] xs:!w-[48px] xs:!h-[48px] {{$arrow == 'bottom-right' ? '!right-[45px] xs:!right-[60px] !left-[unset]': '!relative lg:!absolute lg:!left-0
lg:!right-[unset]'}}"></div>
        <div
            class="swiper-button-next after:!text-[16px] sm:after:!text-[20px] !p-4.5 !w-[36px] !h-[36px] xs:!w-[48px] xs:!h-[48px] {{$arrow == 'bottom-right' ? '!right-0 left-[unset]' : '!relative lg:!absolute lg:!right-0'}}"></div>
    </div>
</div>
<script>
    var swiper{{$id}} = new Swiper(".slider-{{$id}} .swiper", {
        spaceBetween: 30,
        slidesPerView: {{$items != null && $items_mobile != null ? $items_mobile : $items}},
        @if($autoplay == "true")
        speed: 1500,
        centeredSlides: {{$centered}},
        loop: {{$infinity}},
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
        },
        @endif
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        @if($items != null && $items_mobile != null)
        breakpoints: {
            '600': {
                slidesPerView: 2
            }, '1024': {
                slidesPerView: {{$items}}
            }
        },
        @endif
    });
    @if($autoplay == 'false')
swiper{{$id}}.running = false;
    @endif
</script>
