<style>
    .slider-container {
        position: relative;
    }


    {{'.slider-'.$id}} .swiper {
        @if($arrow != 'bottom-right')
          width: calc(100% - 150px);
        @else
          width: 100%;
    @endif


    }

    {{'.slider-'.$id}} .swiper-button-next,
    {{'.slider-'.$id}} .swiper-button-prev {
        color: #525252;
        border: 1px solid #525252;
        border-radius: 100%;
        padding: 20px;
        height: 48px;
        width: 48px;


    }
    @if($arrow == 'bottom-right')
    {{'.slider-'.$id}} .swiper-navigation{
        position:relative;
        right: 0;
        bottom: 0px;
        /*height: 100%;*/
        /*display: flex;*/
        /*margin-top: 20px;*/
        /*gap: 10px;*/
        /*justify-content: right;*/
    }
    {{'.slider-'.$id}} .swiper-button-next{
        right: 0px !important;
        left: unset;
    }
    {{'.slider-'.$id}} .swiper-button-prev{
        right: 60px !important;
        left: unset;
    }
    @endif


    {{'.slider-'.$id}} .swiper-button-next:after,
    {{'.slider-'.$id}} .swiper-button-prev:after {
        font-size: 20px;
    }
</style>

<div class="slider-container slider-{{$id}}">
    <div class="swiper {{$class}}">
        <div class="swiper-wrapper">
            {{$slot}}
        </div>
    </div>
    <div class="swiper-navigation ">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>

<script>
    var swiper{{$id}} = new Swiper(".slider-{{$id}} .swiper", {
        spaceBetween: 30,
        speed: 1500,
        slidesPerView: {{$items}},
        centeredSlides: {{$centered}},
        loop: {{$infinity}},
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
