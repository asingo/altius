<x-mail::message>
    <h1>{{$subj}}</h1>
    <p>
        {{$contentMessage}}
    </p>
    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
