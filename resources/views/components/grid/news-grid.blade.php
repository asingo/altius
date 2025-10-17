@props(['title', 'slug', 'category', 'date'])
<a href="/news/{{$slug}}" class="group">
    <div class="border rounded-xl p-4 space-y-2 border-textsub">
        <div class="flex justify-between w-fit gap-2 items-center text-textsub">
            <span>{{$category}}</span>
            <span>|</span>
            <span>{{\Carbon\Carbon::parse($date)->format('F d, Y')}}</span>
        </div>
        <h3 class="font-medium text-2xl group-hover:text-primary">{!! $title!!}</h3>
    </div>
</a>
