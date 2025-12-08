@props(['title', 'slug', 'category', 'date', 'type'])
<a href="{{localized_route($type == 'news' ? 'newsDetail' : 'articleDetail',[$slug])}}" class="group">
    <div class="border rounded-xl p-4 space-y-2 border-textsub">
        <div class="flex justify-between w-fit gap-2 items-center text-textsub">

            @if($category)
                <span>{{$category}}</span>
                <span>|</span>
            @endif
            <span>{{\Carbon\Carbon::parse($date)->translatedFormat('F d, Y')}}</span>
        </div>
        <h3 class="font-medium text-2xl group-hover:text-primary">{!! $title!!}</h3>
    </div>
</a>
