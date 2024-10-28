<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>


        @foreach ($manuals as $manual)
            <a href="{{route('manual.redirect', $manual->id) }}" alt="{{ $manual->name}}" title="{{$manual->name}}" target="{{ $manual->locally_available ? ' _self' : '_blank'}}" > {{$manual->name}} </a>
        @endforeach

</x-layouts.app>
