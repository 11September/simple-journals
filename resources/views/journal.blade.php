@extends('layoults.layoult')

@section('css')

@endsection

@section('content')
    <div class="wrapper-journal">
        <div class="text-center">
            @if($journal->image)
                <div class="wrapper-item-single-journal">
                    <div class="item-journal">
                        <a href="{{ action('JournalsController@show', $journal->id) }}">
                            <img src="{{ asset('storage/' . $journal->image) }}"
                                 alt="{{ $journal->title }}"
                                 style="width: 100%;">
                        </a>
                    </div>
                </div>
            @endif

            @if($journal->url)
                <h3 class="heading-journal">{{ $journal->url }}</h3>
            @endif

            <div class="content">
                {!! $journal->description !!}
            </div>
        </div>
    </div>

@endsection
