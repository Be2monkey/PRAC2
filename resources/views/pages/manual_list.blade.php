<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    <div class="manuals">
        @foreach ($manuals as $manual)
            <div class="itemsmanual">
                @if ($manual->locally_available)
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                    ({{$manual->filesize_human_readable}})
                @else
                    <a href="{{ $manual->url }}" target="new" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                @endif
            </div>
        @endforeach
    </div>
</x-layouts.app>
