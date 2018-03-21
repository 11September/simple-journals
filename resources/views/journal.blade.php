@extends('layoults.layoult')

@section('css')
    @php
        $text = iconv_strlen($journal->name);
        $text = ( int ) $text;

        $description = iconv_strlen($journal->description);
        $description = ( int ) $description;
    @endphp

    @if($description < 400)
        {{--<style>--}}
            {{--.footer{--}}
                {{--position: fixed;--}}
                {{--bottom: 0;--}}
            {{--}--}}

            {{--.wrapper-journal{--}}
                {{--margin: 40px 0 90px 0;--}}
            {{--}--}}
        {{--</style>--}}
    @endif
@endsection

@section('content')
<div class="container">
    <div class="wrapper-journal">
        <div class="text-center">
            @if($journal->image)
                <div class="wrapper-item-single-journal">
                    <div class="item-journal">
                        <a class="item-link" href="{{ action('JournalsController@advertisement', $journal->id) }}">
                            <img src="{{ asset('storage/' . $journal->image) }}"
                                 class="img-fluid responsive-image"
                                 alt="{{ $journal->name }}">
                        </a>
                    </div>

                    <h3 class="heading-journal"><a href="{{ action('JournalsController@advertisement', $journal->id) }}">CLICK IMAGE TO ORDER</a></h3>

                    <div class="content">
                        {!! $journal->description !!}
                    </div>

                </div>
            @endif

        </div>
    </div>
</div>
@endsection
